<?php
include("../util/Header.php");
include("../util/Navbar.php");
?>
<div class="container-fluid">
  <div class="row">
    <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="TeacherCourses.php">Browse Courses</a>
            <a class="nav-link" href="StudentInfo.php">Browse Students</a>            
          </li>          
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="dashboard">
        <form action="CreateStudentSql.php" method="POST" id="studentForm" class="needs-validation" novalidate>           
            <div class="form-group">
            <?php
            include("../util/Connection.php");            
            ?>
    <label for="studentName">Student Name *</label>
    <input type="text" class="form-control" id="studentName" name="studentName" placeholder="Student Name" aria-describedby="inputGroupPrepend2" required>
    </input>
    <div class="invalid-feedback">Please enter the student name.</div>
</div>
<label for="studentName">Student Surname *</label>
    <input type="text" class="form-control" id="studentSurname" name="studentSurname" placeholder="Student Surname" aria-describedby="inputGroupPrepend2" required>
    </input>
    <div class="invalid-feedback">Please enter the student Surname.</div>
<label for="studentName">Student User Name *</label>
    <input type="text" class="form-control" id="studentUserName" name="studentUserName" placeholder="Student userName" aria-describedby="inputGroupPrepend2" required>
    </input>
    <div class="invalid-feedback">Please enter the student user name.</div>
            <button type="submit" class="btn btn-success">Create</button>            
        </form>
      </div>
    </main>
  </div>
</div>

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
