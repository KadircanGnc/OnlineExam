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
        <table class="table table-striped table-hover table-borderless">
            <thead class="table-info">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Course Name</th>
                <th scope="col">Course Code</th>
                <th scope="col">Instructor Name</th>                
              </tr>
            </thead> 
            <tbody>
            <?php
              include("Course.php");             
              foreach($courses as $c){                                             
                echo"<tr><th scope=\'row\'>".$c["pk"]."</th><td>".$c["cname"]."</td><td><a href=\"CourseDetails.php?code=".$c["code"]."\">".$c["code"]."</a></td><td>".$c["iname"]."</td></tr>";
              }             
            ?>
            </tbody>            
          </table>
      </div>            
    </main>
  </div>
</div>