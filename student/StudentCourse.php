
<?php

include("../util/Connection.php");
$query = "SELECT c.code AS code, c.name AS name, i.name AS tName FROM courses c,course_student cs,student s,instructor i WHERE s.pk = cs.studentFk AND cs.courseFk = c.pk AND c.instructorFk = i.pk AND s.pk = (SELECT s.pk FROM student s, user u WHERE u.pk = s.userFk AND u.pk = ?)";
$stmt = $con->prepare($query);

if ($stmt) {
    $stmt->bind_param("i", $_SESSION["userPk"]);
    $stmt->execute();
    $result = $stmt->get_result();
}    
$courses = array();

if ($result->num_rows > 0) {  
  while ($row = $result->fetch_assoc()) {
      $courses[] = $row;
    }
}

?>