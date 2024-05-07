
<?php

include("../util/Connection.php");
$query = "SELECT c.code AS code, c.name AS cName, e.type AS eType, e.date AS eDate FROM student s, course_student cs, courses c, exam e WHERE s.pk = cs.studentFk AND cs.courseFk = c.pk AND c.pk = e.courseFk AND s.pk = (SELECT s.pk FROM student s, user u WHERE u.pk = s.userFk AND u.pk = ?) ORDER BY eDate";
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