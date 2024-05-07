
<?php
include("../util/Connection.php");
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
      <table class="table table-striped table-hover table-borderless">
            <thead class="table-info">
              <tr>                
                <th scope="col">Student ID</th>
                <th scope="col">Student Name</th>
                <th scope="col">Student User Name</th>                                                                              
              </tr>
            </thead> 
            <tbody>
            <?php              
              $query = "SELECT s.pk AS spk, s.name AS sname, u.userName as uname FROM student s, user u WHERE u.pk = s.userFk"; 
              $result = $con->query($query); 
              $exams = array();             

                if ($result->num_rows > 0) {  
                    while ($row = $result->fetch_assoc()) {
                    $students[] = $row;
                    }
                }         
                foreach($students as $s) {                                             
                  echo "<tr>";
                  echo "<th scope='row'>" . $s["spk"] . "</th>";
                  echo "<td>" . $s["sname"] . "</td>";
                  echo "<td>" . $s["uname"] . "</td>";                  
                  echo "<td>";                  
                  echo "</td>";
                  echo "</tr>";                 
                }
            ?>
            
            </tbody>            
          </table>            
      </div>
          <?php          
            echo'<div class="text-right col-md-9"><a class="btn btn-success" href="CreateStudent.php" role="button">Create New Student</a></div>';
          ?>
    </main>
  </div>
</div>






