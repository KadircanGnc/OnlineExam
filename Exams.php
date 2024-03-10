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
                <th scope="col">Exam Name</th>
                <th scope="col">Exam Duration</th>
                <th scope="col">Exam Date</th> 
                <th scope="col">Course ID</th>
                <th scope="col">Course Name</th>
                <th scope="col">Action</th>                              
              </tr>
            </thead>            
            <tbody>                
              <tr>
                <th scope="row">1</th>
                <td>Midterm1</td>
                <td>90 Minutes</td>
                <td>22.04.2024</td> 
                <td>CSE204</td>
                <td>Database Management Systems</td>     
                <td><button type="button" class="btn btn-warning">Edit</button><button type="button" class="btn btn-danger">Delete</button></td>                          
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Quiz2</td>
                <td>30 Minutes</td>
                <td>25.04.2024</td> 
                <td>MAT222</td>
                <td>Linear Algebra</td>      
                <td><button type="button" class="btn btn-warning">Edit</button><button type="button" class="btn btn-danger">Delete</button></td>                          
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Final</td>
                <td>120 Minutes</td>
                <td>29.04.2024</td> 
                <td>CSE320</td>
                <td>Computer Networks</td>
                <td><button type="button" class="btn btn-warning">Edit</button><button type="button" class="btn btn-danger">Delete</button></td>             
              </tr>                         
            </tbody>
          </table>
      </div>
      <div class="text-right col-md-9"><a class="btn btn-success" href="TeacherExamCreation.php" role="button">Create New Exam</a></div>
    </main>
  </div>
</div>