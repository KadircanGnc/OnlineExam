
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
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="dashboard">        
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
                echo "<div style='font-size: 20px; padding: 10px;'>";
                echo "<strong>Course Name:</strong> " . $c["cname"] . "<br>";
                echo "<strong>Course Code:</strong> " . $c["code"] . "<br>";
                echo "<strong>Instructor:</strong> " . $c["iname"] . "<br></div>";                
              }             
            ?>            
          <table class="table table-striped table-hover table-borderless">
            <thead class="table-info">
              <tr>                
                <th scope="col">Exam Date</th>
                <th scope="col">Exam Type</th>
                <th scope="col">Grade</th>
                <th scope="col">Action</th>               
              </tr>
            </thead> 
            <tbody>
            <?php
              include("Connection.php");
              $code = $_GET["code"];
              $query = "SELECT c.pk,e.pk AS epk,e.date AS edate,e.type AS etype,e.grade AS egrade FROM courses c,exam e WHERE c.pk=e.courseFk AND c.code='$code'"; 
              $result = $con->query($query); 
              $exams = array();             

                if ($result->num_rows > 0) {  
                    while ($row = $result->fetch_assoc()) {
                    $exams[] = $row;
                    }
                }         
                foreach($exams as $e) {                                             
                  echo "<tr><th scope='row'>" . $e["edate"] . "</th><td>" . $e["etype"] . "</td><td>%" . $e["egrade"] . "</td><td>";                  
                  // Form for editing exam
                  echo "<form id='editForm' method='post' action='EditExam.php' style='display: inline-block;'>";
                  echo "<input type='hidden' name='epk1' value='" . $e["epk"] . "'>";
                  echo "<input type='hidden' name='courseCode' value='" . $code . "'>";                  
                  echo '<button type="submit" class="btn btn-warning" name="editExam">Edit</button>';
                  echo "</form>";                  
                  // Form for deleting exam
                  echo "<form id='deleteForm' method='post' action='ExamDelete.php' style='display: inline-block;'>";
                  echo "<input type='hidden' name='epk' value='" . $e["epk"] . "'>";
                  echo "<input type='hidden' name='courseCode' value='" . $code . "'>";                
                  echo "<button type='submit' class='btn btn-danger' name='examDelete'>Delete</button>";
                  echo "</form>";              
                  echo "</td></tr>";
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