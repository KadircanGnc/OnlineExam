
<?php
$con = new mysqli("localhost", "kadir", "147258", "onlineexam");
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
?>