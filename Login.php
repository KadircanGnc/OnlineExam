
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>  
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="util/Login.css">  
</head>
<body style="background-color: #508bfc;">
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <h3 class="mb-5">Welcome to Online Exam!</h3>

              <div class="card login-card" id="instructorLogin">
                <div class="card-body">
                  <h5 class="card-title mb-4">Instructor Login</h5>
                  <form method="post" action="util/LoginCheck.php" class="needs-validation" novalidate>
                    <div class="form-group">
                      <label for="iUsername">Username</label>
                      <input type="text" class="form-control" id="iUsername" name="username" placeholder="Enter username" required>
                      <div class="invalid-feedback">Please enter your username.</div>
                    </div>
                    <div class="form-group">
                      <label for="iPassword">Password</label>
                      <input type="password" class="form-control" id="iPassword" name="password" placeholder="Enter password" required>
                      <div class="invalid-feedback">Please enter your password.</div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                  </form>
                </div>
              </div>

              <div class="card login-card mt-3" id="studentLogin">
                <div class="card-body">
                  <h5 class="card-title mb-4">Student Login</h5>
                  <form method="post" action="util/LoginCheck.php" class="needs-validation" novalidate>
                    <div class="form-group">
                      <label for="sUsername">Username</label>
                      <input type="text" class="form-control" id="sUsername" name="username" placeholder="Enter username" required>
                      <div class="invalid-feedback">Please enter your username.</div>
                    </div>
                    <div class="form-group">
                      <label for="sPassword">Password</label>
                      <input type="password" class="form-control" id="sPassword" name="password" placeholder="Enter password" required>
                      <div class="invalid-feedback">Please enter your password.</div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                  </form>
                </div>
              </div>

              <div class="center-buttons mt-4">
                <button class="btn btn-primary btn-lg btn-block" onclick="showInstructorLogin()">Instructor</button>
                <button class="btn btn-primary btn-lg btn-block mt-2" onclick="showStudentLogin()">Student</button>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>  
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>    
    function showInstructorLogin() {
      document.getElementById('instructorLogin').style.display = 'block';
      document.getElementById('studentLogin').style.display = 'none';
    }    
    function showStudentLogin() {
      document.getElementById('studentLogin').style.display = 'block';
      document.getElementById('instructorLogin').style.display = 'none';
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
  
</body>
</html>

