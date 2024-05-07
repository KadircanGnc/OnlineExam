<?php
session_start();
include("../util/Connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Server-side validation
    if (empty($_POST["studentName"]) || empty($_POST["studentSurname"]) || empty($_POST["studentUserName"])) {
        // Display error message in modal
        echo '<script>';
        echo 'document.addEventListener("DOMContentLoaded", function() {';
        echo 'document.getElementById("errorMessage").innerText = "All fields are required.";';
        echo 'document.getElementById("errorModal").modal("show");';
        echo '});';
        echo '</script>';
        exit();
    }

    // Sanitize input data
    $studentName = testInput($_POST["studentName"]);
    $studentSurname = testInput($_POST["studentSurname"]);
    $studentUserName = testInput($_POST["studentUserName"]);   
    

    $sql = "INSERT INTO user (firstName, lastName, role, userName, updatedBy) VALUES (?, ?, ?, ?, ?)";
         $stmt = $con->prepare($sql);
         $role = "student";   
         if ($stmt) {
             // Bind the parameters to the placeholders
             $stmt->bind_param("sssss", $studentName, $studentSurname, $role , $studentUserName, $_SESSION["username"]);
 
             // Execute the prepared statement
             if ($stmt->execute()) {                 
                $userPk = $stmt->insert_id;
                $sFullName = $studentName . " " . $studentSurname;

                $sql2 = "INSERT INTO student (name, userFk, updatedBy) VALUES (?, ?, ?)";
                $stmt2 = $con->prepare($sql2);

                if ($stmt2) {
                    // Bind the parameters to the placeholders
                    $stmt2->bind_param("sss", $sFullName, $userPk, $_SESSION["username"]);
    
                    // Execute the prepared statement
                    if ($stmt2->execute()) {
                        header("Location: StudentInfo.php");
                        exit();
                    } else {
                        echo "Error executing statement: " . $stmt2->error;
                    }
                    // Close the statement
                    $stmt2->close();
                }

             } else {
                 echo "Error executing statement: " . $stmt->error;
             }
             // Close the statement
             $stmt->close();
            }
            
 } else {
     // Redirect or display an error message if accessed without POST method
     echo "Invalid request.";
 }

function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}