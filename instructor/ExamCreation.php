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
        <form action="ExamInsert.php" method="POST" id="examForm" class="needs-validation" novalidate>
            <div class="form-group"> 
              <?php              
              $code = $_GET["code"];
              echo'<label>'.$code.'</label>'; 
              ?>              
            </div>
            <input type="hidden" name="code" value="<?php echo $code; ?>">
            <div class="form-group">
            <?php
            include("../util/Connection.php");            
            $sqlGetPk = "SELECT pk FROM courses WHERE code = ?";
            $stmtGetPk = $con->prepare($sqlGetPk);
            if ($stmtGetPk) {
                $stmtGetPk->bind_param("s", $code);
                $stmtGetPk->execute();
                $stmtGetPk->bind_result($coursePk);
                $stmtGetPk->fetch();
                $stmtGetPk->close();
            } else {              
              echo "Error preparing statement: " . $con->error;
            }
            // Check if a final exam exists for this course
            if ($coursePk) {
                $sqlCheckFinalExam = "SELECT COUNT(*) AS count FROM exam WHERE type = 'Final' AND courseFk = ?";
                $stmtCheckFinalExam = $con->prepare($sqlCheckFinalExam);
                if ($stmtCheckFinalExam) {
                    $stmtCheckFinalExam->bind_param("i", $coursePk);
                    $stmtCheckFinalExam->execute();
                    $stmtCheckFinalExam->bind_result($examCount);
                    $stmtCheckFinalExam->fetch();
                    $stmtCheckFinalExam->close();        
                    // $examCount contains the count of final exams for this course
                    $finalExamExists = $examCount > 0;
                } else {                
                  echo "Error preparing statement: " . $con->error;
                }
              } else {                  
                echo "Course not found.";
              }
            ?>
    <label for="examName">Exam Name *</label>
    <select class="form-control" id="examName" name="examName" aria-describedby="inputGroupPrepend2" required>
        <option value="" selected disabled hidden>Select exam name</option>
        <option value="Midterm">Midterm</option>
        <?php if (!$finalExamExists) : ?>
        <option value="Final">Final</option>
        <?php endif; ?>
        <option value="Project">Project</option>
        <option value="Homework">Homework</option>
        <option value="Other">Other</option>
    </select>
    <div class="invalid-feedback">Please select the exam name.</div>
</div>
            <div class="form-group ">
              <label for="examPercentage">Exam Percentage * (%)</label>
              <input type="range" class="form-control-range" id="examPercentage" name="examPercentage" min="0" max="100" onchange="updatePercentage(this.value)" required>
              <p id="percentageValue" style="text-align: center;">% 0</p>
              <div class="invalid-feedback">Please select the exam percentage.</div>
            </div>
            <div class="form-group">
              <label for="examDate">Exam Date *</label>
              <input type="date" class="form-control" id="examDate" name="examDate" required>
              <div class="invalid-feedback">Please select the exam date.</div>
            </div>            
            <button type="submit" class="btn btn-success">Create</button>            
        </form>
      </div>
    </main>
  </div>
</div>

<script>
    function updatePercentage(value) {
      document.getElementById('percentageValue').innerText = value + ' %';
    }
</script>

<!-- Bootstrap form validation script -->
<script>
    // Disable form submission if fields are invalid
    (function() {
        'use strict';
        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>
