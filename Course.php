
<?php
include("Connection.php");
$query = "SELECT c.pk,c.name AS cname,c.code,i.name AS iname FROM courses c,instructor i WHERE c.instructorFk=i.pk";
$result = $con->query($query);

$courses = array();

if ($result->num_rows > 0) {  
  while ($row = $result->fetch_assoc()) {
      $courses[] = $row;
  }
}

?>
