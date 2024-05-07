<?php
session_start();
include("../util/Connection.php");
$username = $_SESSION["username"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if students array is set in the POST data
    if (isset($_POST['students']) && is_array($_POST['students'])) {
        $students = $_POST['students']; // Array of selected student IDs        
        // Get the course code from the form data
        $code = $_GET["code"];
        $query = "SELECT pk FROM courses WHERE code='$code'";
          $result = $con->query($query);
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $coursePk = $row['pk'];              
            }
        }
        
        foreach ($students as $studentId) {
            
            $insertQuery = "INSERT INTO course_student (courseFk, studentFk, updatedBy) VALUES ('$coursePk', '$studentId','$username')";
            if ($con->query($insertQuery) === TRUE) {
                echo '<script>';
                echo 'alert("Student added to the course successfully!");';
                echo 'window.location.href = "CourseDetails.php?code='.$code.'";'; 
                echo '</script>';
            } else {
                echo "Error assigning student: " . $con->error;
            }
        }
        
        $con->close();
    } else {
        echo "No students selected.";
    }
} else {
    echo "Invalid request.";
}
?>