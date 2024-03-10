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
        <form>
            <div class="form-group">
              <label for="examName">Exam Name</label>
              <input type="text" class="form-control" id="examName" placeholder="Enter exam name">
            </div>
            <div class="form-group">
              <label for="examDuration">Exam Duration (minutes)</label>
              <input type="range" class="form-control-range" id="examDuration" min="0" max="200" onchange="updateDuration(this.value)">
              <p id="durationValue" style="text-align: center;">0 minutes</p>
            </div>
            <div class="form-group">
              <label for="examDate">Exam Date</label>
              <input type="date" class="form-control" id="examDate">
            </div>
            <div class="form-group">
              <label for="course">Course</label>
              <select class="form-control" id="course">
                <option>Select Course</option>
                <option>Computer Networks</option>
                <option>Linear Algebra</option>
                <option>Computer Organization</option>
              </select>
            </div>
            <button type="submit" class="btn btn-success">Create</button>
          </form>
      </div>
    </main>
  </div>
</div>

<script>
    function updateDuration(value) {
      document.getElementById('durationValue').innerText = value + ' minutes';
    }
</script>