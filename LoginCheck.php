<?php
session_start();
include("Connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize username and password
    $username = sanitizeInput($_POST['username']);
    $password = sanitizeInput($_POST['password']);
    
    $sql = "SELECT * FROM user WHERE userName = '$username' AND password = '$password'";
    $result = $con->query($sql);

    if ($result->num_rows == 1) {
        // User credentials are valid, set session variables and redirect
        $row = $result->fetch_assoc();
        $_SESSION["username"] = $username;
        $_SESSION["role"] = $row["role"];
        $_SESSION["name"] = $row["firstName"] ." ". $row["lastName"];
        $_SESSION["userPk"] = $row["pk"];
        
        if ($_SESSION["role"] == "instructor") {
            header("Location: TeacherHome.php");
            exit();
        } elseif ($_SESSION["role"] == "student") {
            header("Location: StudentHome.php");
            exit();
        }
    } else {
        // Invalid credentials, redirect back to login page with an error message
        header("Location: Login.php?error=invalid_credentials");
        exit();
    }
    
} else {
    // Redirect back to login page if accessed directly without form submission
    header("Location: Login.php");
    exit();
}

function sanitizeInput($data) {
    
  $data = trim($data);    
  $data = htmlspecialchars($data);
  return $data;
}

?>