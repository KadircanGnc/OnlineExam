
<?php
include("Header.php");
include("Navbar.php");
?>

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
                <th scope="col">Course Name</th>
                <th scope="col">Course Code</th>
                <th scope="col">Instructor Name</th>                
              </tr>
            </thead> 
            <tbody>
            <?php
              include("Connection.php");  
              $code = $_GET["code"];
              $query = "SELECT c.name AS cname,c.code AS code,i.name AS iname FROM courses c,instructor i WHERE c.instructorFk=i.pk AND c.code='$code'";
              $result = $con->query($query);
                              
              $courses = array();
              if ($result->num_rows > 0) {  
                    while ($row = $result->fetch_assoc()) {
                    $courses[] = $row;
                    }
               }        
              foreach($courses as $c){                                                    
                echo"<tr><th scope=\'row\'>".$c["cname"]."</th><td>".$c["code"]."</td><td>".$c["iname"]."</td></tr>";
              }             
            ?>
            </tbody>            
          </table>
          <table class="table table-striped table-hover table-borderless">
            <thead class="table-info">
              <tr>                
                <th scope="col">Exam Date</th>
                <th scope="col">Exam Type</th>
                <th scope="col">Grade</th>                
              </tr>
            </thead> 
            <tbody>
            <?php
              include("Connection.php");
              $code = $_GET["code"];
              $query = "SELECT c.pk,e.date AS edate,e.type AS etype,e.grade AS egrade FROM courses c,exam e WHERE c.pk=e.courseFk AND c.code='$code'"; 
              $result = $con->query($query); 
              $exams = array();             

                if ($result->num_rows > 0) {  
                    while ($row = $result->fetch_assoc()) {
                    $exams[] = $row;
                    }
                }         
              foreach($exams as $e){                                             
                echo"<tr><th scope=\'row\'>".$e["edate"]."</th><td>".$e["etype"]."</td><td>%".$e["egrade"]."</td></tr>";
              }             
            ?>
            </tbody>            
          </table>
      </div>
      <?php 
      $code = $_GET["code"];     
      echo'<div class="text-right col-md-9"><a class="btn btn-success" href="TeacherExamCreation.php?code='.$code.'" role="button">Create New Exam</a></div>' 
      ?>    
    </main>
  </div>
</div>