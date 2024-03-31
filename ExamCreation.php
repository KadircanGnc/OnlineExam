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
              <label for="examName">Exam Name</label>
              <input type="text" class="form-control" id="examName" name="examName" placeholder="Enter exam name" aria-describedby="inputGroupPrepend2" required>
              <div class="invalid-feedback">Please enter the exam name.</div>
            </div>
            <div class="form-group ">
              <label for="examPercentage">Exam Percentage (%)</label>
              <input type="range" class="form-control-range" id="examPercentage" name="examPercentage" min="0" max="100" onchange="updatePercentage(this.value)" required>
              <p id="percentageValue" style="text-align: center;">% 0</p>
              <div class="invalid-feedback">Please select the exam percentage.</div>
            </div>
            <div class="form-group">
              <label for="examDate">Exam Date</label>
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
