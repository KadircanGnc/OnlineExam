
<?php
$con = new mysqli("localhost", "kadir", "147258", "exam");
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
?>