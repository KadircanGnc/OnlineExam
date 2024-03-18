
<?php
include("Connection.php");
$query = "SELECT * FROM courses";
$result = $con->query($query);

$courses = array();

if ($result->num_rows > 0) {  
  while ($row = $result->fetch_assoc()) {
      $courses[] = $row;
  }
}

$coursesJson = json_encode($courses);
$coursesJ = json_decode($coursesJson);
?>
