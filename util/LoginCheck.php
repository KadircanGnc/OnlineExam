<?php
session_start();
include("Connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize username and password
    $username = testInput($_POST['username']);
    $password = md5(testInput($_POST['password']));
    
    $sql = "SELECT * FROM user WHERE userName = ? AND password = ?";
    $stmt = $con->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // User credentials are valid, set session variables and redirect
            $row = $result->fetch_assoc();
            $_SESSION["username"] = $username;
            $_SESSION["role"] = $row["role"];
            $_SESSION["name"] = $row["firstName"] ." ". $row["lastName"];
            $_SESSION["userPk"] = $row["pk"];

            if ($_SESSION["role"] == "instructor") {
                header("Location: ../instructor/TeacherHome.php");
                exit();
            } elseif ($_SESSION["role"] == "student") {
                header("Location: ../student/StudentHome.php");
                exit();
            }
        } else {
            // Invalid credentials, redirect back to login page with an error message
            header("Location: ../Login.php?error=invalid_credentials");
            exit();
        }

        $stmt->close();
    } else {        
        echo "Error preparing statement: " . $con->error;
    }
} else {
    // Redirect back to login page if accessed directly without form submission
    header("Location: ../Login.php");
    exit();
}


function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>