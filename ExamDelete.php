
<?php
include("Connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["examDelete"])) {
    $pk = $_POST["epk"];
    $courseCode = $_POST["courseCode"];
    
    $query = "DELETE FROM exam WHERE pk = ?";
    $delete = $con->prepare($query);

    if ($delete) {
        $delete->bind_param("i", $pk);
        $delete->execute();

        if ($delete->affected_rows > 0) {
            header("Location: CourseDetails.php?code=$courseCode");
            exit();
        } else {
            echo "No rows affected. Failed to delete exam.";
        }

        $delete->close();
    } else {
        echo "Error preparing statement.";
    }
} else {
    echo "Invalid request.";
}
?>
