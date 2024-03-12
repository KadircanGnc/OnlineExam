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
              $courseArray = array($database, $linear); 
              echo json_encode($courseArray);              
              foreach($courseArray as $c){                                             
                echo"<tr><th scope=\'row\'>$c->id</th><td>$c->courseCode</td><td>$c->courseName</td></tr>";
              }            
             // $rowid = 0;             
             // $courses = array("CSE204"=>"Database Management Systems","MAT222"=>"Linear Algebra","CSE320"=>"Computer Networks","CSE206"=>"Computer Organization","CSE236"=>"Web Programming");
             // foreach($courses as $cid => $cvalue ){
             //     $cArray = array(new Course($rowid + 1, $cid, $cvalue));                  
             //     echo"<tr><th scope=\"row\">$cArray[$rowid]->id</th><td>$cArray[$rowid]->courseCode</td><td>$cArray[$rowid]->courseName</td></tr>";
             //     $rowid++;
             // }
            ?>
            </tbody>            
          </table>
      </div>
      <div class="text-right col-md-9"><a class="btn btn-success" href="TeacherExamCreation.php" role="button">Create New Exam</a></div>      
    </main>
  </div>
</div>