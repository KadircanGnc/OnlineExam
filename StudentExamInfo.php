<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="dashboard">
        <table class="table table-striped table-hover table-borderless">
            <thead class="table-info">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Course ID</th>
                <th scope="col">Course Name</th>
                <th scope="col">Exam Name</th>
                <th scope="col">Action</th>
              </tr>
            </thead>            
            <tbody>
              <?php
                $rowid = 1;
                $examInfo = array("CSE204"=>"Database Management Systems","MAT222"=>"Linear Algebra","CSE320"=>"Computer Networks","CSE206"=>"Computer Organization","CSE236"=>"Web Programming");
                foreach ($examInfo as $key => $value) {
                  echo "<tr><th scope=\"row\">$rowid</th><td>$key</td><td>$value</td><td>Exam$rowid</td><td><button type=\"button\" class=\"btn btn-success\">Start Exam</button></td></tr>";
                  $rowid++;
                }
              ?>            
            </tbody>
          </table>
      </div>
    </main>