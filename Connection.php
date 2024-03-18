
<?php
$con = new mysqli("localhost", "root", "", "onlineexam");
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
?>