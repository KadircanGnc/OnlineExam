
<?php
include("Connection.php");
$examName = $_POST["examName"];
$examPercentage = $_POST["examPercentage"];
$examDate = $_POST["examDate"];
$code = $_POST["code"];

$get_pk_sql = "SELECT pk FROM courses WHERE code = '$code'";
$result = $con->query($get_pk_sql);
$row = $result->fetch_assoc();
$courseFk = $row["pk"];

$sql = "INSERT INTO exam (date, type, grade, courseFk) VALUES ('$examDate', '$examName', '$examPercentage', '$courseFk')";
if ($con->query($sql) === TRUE) {
    header("Location: CourseDetails.php?code=$code");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
} 

?>