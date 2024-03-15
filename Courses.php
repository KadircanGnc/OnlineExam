<div class="container-fluid">
  <div class="row">
    <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="TeacherCourses.php">Browse Courses</a>            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="TeacherExams.php">Browse Exams</a>            
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="dashboard">
        <table class="table table-striped table-hover table-borderless">
            <thead class="table-info">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Course ID</th>
                <th scope="col">Course Name</th>                
              </tr>
            </thead> 
            <tbody>
            <?php
              include("Course.php");             
              foreach($courseObj as $c){                                             
                echo"<tr><th scope=\'row\'>".$c->id."</th><td>".$c->courseCode."</td><td>".$c->courseName."</td></tr>";
              }
             
            ?>
            </tbody>            
          </table>
      </div>
      <div class="text-right col-md-9"><a class="btn btn-success" href="TeacherExamCreation.php" role="button">Create New Exam</a></div>      
    </main>
  </div>
</div>