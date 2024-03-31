<?php
include("Connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Server-side validation
    if (empty($_POST["examName"]) || empty($_POST["examPercentage"]) || empty($_POST["examDate"]) || empty($_POST["code"])) {
        // Display error message in modal
        echo '<script>';
        echo 'document.addEventListener("DOMContentLoaded", function() {';
        echo 'document.getElementById("errorMessage").innerText = "All fields are required.";';
        echo 'document.getElementById("errorModal").modal("show");';
        echo '});';
        echo '</script>';
        exit();
    }

    // Sanitize input data
    $examName = testInput($_POST["examName"]);
    $examPercentage = testInput($_POST["examPercentage"]);
    $examDate = testInput($_POST["examDate"]);
    $code = testInput($_POST["code"]);

    // Get course primary key
    $get_pk_sql = "SELECT pk FROM courses WHERE code = '$code'";
    $result = $con->query($get_pk_sql);
    $row = $result->fetch_assoc();
    $courseFk = testInput($row["pk"]);

    $newGradeSum = calculateGradeSum($courseFk) + $examPercentage;

    // Check if the new sum exceeds 100
    if ($newGradeSum > 100) {
        // Display an alert indicating that the total grade exceeds 100
        echo '<script>';
        echo 'alert("The total grade for the course exceeds 100%. Please adjust the exam percentage.");';
        echo 'window.history.back();';  // Go back to the previous page
        echo '</script>';
        exit();
    }

    // Insert data into database
    $sql = "INSERT INTO exam (date, type, grade, courseFk) VALUES ('$examDate', '$examName', '$examPercentage', '$courseFk')";
    if ($con->query($sql) === TRUE) {
        header("Location: CourseDetails.php?code=$code");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
} else {
    // Redirect or display an error message if accessed without POST method
    echo "Invalid request.";
}

function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function calculateGradeSum($courseFk) {
    global $con;
    $sumQuery = "SELECT SUM(grade) AS total_grade FROM exam WHERE courseFk = ?";
    $stmt = $con->prepare($sumQuery);
    $stmt->bind_param("i", $courseFk);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $sum = $row['total_grade'];
    $stmt->close();
    return $sum;
}
?>