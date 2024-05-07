<div class="container-fluid">
  <div class="row">
    <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="StudentExams.php">Browse Courses</a> 
            <a class="nav-link" href="StudentHome.php">Browse Exams</a>           
          </li>          
        </ul>
      </div>
    </nav>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="dashboard">
      <h1 class="display-4 text-center mb-4">MY COURSES</h1>
        <table class="table table-striped table-hover table-borderless">
            <thead class="table-info">
              <tr>                
                <th scope="col">Course Code</th>
                <th scope="col">Course Name</th>
                <th scope="col">Instructor Name</th>                           
              </tr>
            </thead>            
            <tbody>
              <?php
                include("StudentCourse.php");             
                foreach($courses as $c){                                             
                  echo"<tr><th scope=\'row\'>".$c["code"]."</th><td>".$c["name"]."</td><td>".$c["tName"]."</td></tr>";
                }             
              ?>
            </tbody>
          </table>
      </div>
    </main>
  </div>
</div>