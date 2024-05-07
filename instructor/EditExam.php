<?php

include("../util/Connection.php");
include("../util/Header.php");
include("../util/Navbar.php");

$epk = testInput($_POST['epk1']);
$courseCode = testInput($_POST['courseCode']);

$query = "SELECT date, type, grade FROM exam WHERE pk = ?";
$stmt = $con->prepare($query);

if ($stmt) {
    $stmt->bind_param("i", $epk); 
    $stmt->execute();
    $stmt->bind_result($date, $type, $grade);
    $stmt->fetch();
    $stmt->close();        
} else {
    echo "Error preparing statement.";
}       

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Handle form submission for updating exam details
    $newExamName = testInput($_POST['examName']);
    $newExamPercentage = testInput($_POST['examPercentage']);
    $newExamDate = testInput($_POST['examDate']);
    
    $newGradeSum = calculateGradeSum($courseFk) + $newExamPercentage;
    $newGradeSum = calculateGradeSum($courseCode);
 
 // Check if the new sum exceeds 100
 if ($newGradeSum > 100) {
    // Display an alert indicating that the total grade exceeds 100
    echo '<script>';
    echo 'alert("The total grade for the course exceeds 100%. Please adjust the exam percentage.");';
    echo 'window.history.back();';  // Go back to the previous page
    echo '</script>';
    exit();
}
    
    // Update the exam record in the database
    $updateQuery = "UPDATE exam SET type = ?, grade = ?, date = ?, updatedBy = ? WHERE pk = ?";
    $updateStmt = $con->prepare($updateQuery);

    if ($updateStmt) {
        $updateStmt->bind_param("sdssi", $newExamName, $newExamPercentage, $newExamDate, $_SESSION["username"], $epk);
        $updateStmt->execute();
        $updateStmt->close();

        // Redirect to a confirmation page or back to CourseDetails.php
        header("Location: CourseDetails.php?code=$courseCode");
        exit();
    } else {
        echo "Error preparing update statement.";
    }
}

function calculateGradeSum($courseFk) {
  global $con;
  $sumQuery = "SELECT SUM(grade) AS total_grade FROM exam WHERE courseFk = ?";
  $stmt = $con->prepare($sumQuery);
  $stmt->bind_param("i", $courseFk);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $sum = $row['total_grade'];
  $stmt->close();
  return $sum; 
}

function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<div class="container-fluid">
  <div class="row">
    <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="TeacherCourses.php">Browse Courses</a>            
          </li>          
        </ul>
      </div>
    </nav>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="dashboard">
        <form action="" method="POST" id="examForm" class="needs-validation" novalidate>
            <input type="hidden" name="epk1" value="<?php echo $epk; ?>">
            <input type="hidden" name="courseCode" value="<?php echo $courseCode; ?>">
            <div class="form-group">
                <label for="examName">Exam Name *</label>
                <select class="form-control" id="examName" name="examName" aria-describedby="inputGroupPrepend2" required>
                <option value="" selected disabled hidden><?php echo $type; ?></option>
                <option value="Midterm" >Midterm</option>
                <option value="Final" >Final</option>
                <option value="Project" >Project</option>
                <option value="Homework" >Homework</option>
                <option value="Other" >Other</option>
            </select>
            <div class="invalid-feedback">Please select the exam name.</div>
        </div>
            <div class="form-group">
                <label for="examPercentage">Exam Percentage * (%)</label>
                <input type="range" class="form-control-range" id="examPercentage" name="examPercentage" min="0" max="100" value="<?php echo $grade; ?>" onchange="updatePercentage(this.value)" required>
                <p id="percentageValue" style="text-align: center;">% <?php echo $grade; ?></p>
                <div class="invalid-feedback">Please select the exam percentage.</div>
            </div>
            <div class="form-group">
                <label for="examDate">Exam Date *</label>
                <input type="date" class="form-control" id="examDate" name="examDate" value="<?php echo $date; ?>" required>
                <div class="invalid-feedback">Please select the exam date.</div>
            </div>
            <button type="submit" class="btn btn-success" name="update">Update Exam</button>
        </form>
    </div>
</main>
  </div>
<script>
    function updatePercentage(value) {
        document.getElementById('percentageValue').innerText = value + ' %';
    }

    // Bootstrap form validation script
    (function () {
        'use strict';
        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>

<script>
    // Check if there is an error message in the URL query parameter
    const urlParams = new URLSearchParams(window.location.search);
    const error = urlParams.get('error');
    if (error) {
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("errorMessage").innerText = decodeURIComponent(error);
            document.getElementById("errorAlert").classList.add("show");
        });
    }
</script>