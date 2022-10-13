<?php
    session_start();
    // if(!isset($_SESSION['email']) OR $_SESSION['email'] == 0){
    //     header("location: login.php");
    // }

    require_once("./config.php");
    require_once("./auxiliaries.php");

    if(isset($_POST['sendresquest'])){
      $studentid = $_SESSION['studentid'];
      $accountant = sterilize($_POST['accountant']);
      $librarian = sterilize($_POST['librarian']);
      $computerlab = sterilize($_POST['computerlab']);
      $faslab = sterilize($_POST['faslab']);
      $sportscoach = sterilize($_POST['sportscoach']);
      $halltutor = sterilize($_POST['halltutor']);
      $deanincharge = sterilize($_POST['deanincharge']);

      if(!empty($accountant) && !empty($librarian) && !empty($computerlab) && 
      !empty($faslab) && !empty($sportscoach) && !empty($halltutor) && !empty($deanincharge)){
        $sqlInsertClearanceForm = "INSERT INTO clearance(studentsid, accountant, librarian, computerlab, faslab,
        halltutor, deanincharge, sportscoach) 
        VALUES('$studentid','$accountant','$librarian','$computerlab','$faslab','$halltutor',' $deanincharge','$sportscoach')";
        $statement = $conn->prepare($sqlInsertClearanceForm);
        $results = $statement->execute();

        if($results){
          $_SESSION['message'] = "Requests Sent!!";
          $_SESSION['alert'] = "alert alert-success";
        } else {
          $_SESSION['message'] = "Something! Went wrong!!";
          $_SESSION['alert'] = "alert alert-danger";
        }
      } else{
        $_SESSION['message'] = "All Fields are required!!";
        $_SESSION['alert'] = "alert alert-danger";
      }
    }



;?>

<?php require_once("./includes/head-ui.php");?>
  <body>
<?php require_once("./includes/side-bar-ui.php");?>
    <?php require_once("./includes/header-ui.php");?>
     <div class="container">
        <h4>Cleared Students</h4>
        

                    
          
        <p class="text-primary">
           
        </p>
        
        <div class="container">
            
        </div>
        <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Status</th>
                 
                  </tr>
                </thead>
                <tbody>

                <?php
                $officerid = $_SESSION['officerid'];
                $officerdepartment =  $_SESSION['officerdepartment'];

                $sqlSelectStudentsPerOfficerDepartment = "SELECT * FROM students";
                $statement = $conn->prepare($sqlSelectStudentsPerOfficerDepartment);
                $results = $statement->execute();
                $rows = $statement->rowCount();
                $columns = $statement->fetchAll();

                foreach($columns as $column){
                  $computerlab = $column['computerlab'];
                  $accountant = $column['accountant'];
                  $librarian = $column['librarian'];
                  $computerlab = $column['computerlab'];
                  $laboratory = $column['laboratory'];
                  $deanincharge = $column['deanincharge'];
                  $halltutor = $column['halltutor'];
                }

                if($officerdepartment == 'computerlab'){
                  $sql = "SELECT * FROM students WHERE computerlab = 1 AND status = 1";
                  $statement = $conn->prepare($sql);
                  $results = $statement->execute();
                  $rows = $statement->rowCount();
                  $columns = $statement->fetchAll();

                  if($results){
                    foreach($columns as $column){
                      $studentid = $column['studentid'];
                      $studentfullname = $column['studentfullname'];

                      echo "
                      <tr>
                        <th>
                        {$studentid}
                        </th>
                        <th>
                        {$studentfullname}
                        </th>
                        <th>
                      '<span class='badge badge-sm bg-success ms-auto'>Verified</span>'
                        </th>
                        </tr>
                      ";
                    }
                  }

                }

                if($officerdepartment == 'accountant'){
                  $sql = "SELECT * FROM students WHERE accountant = 1 AND status = 1";
                  $statement = $conn->prepare($sql);
                  $results = $statement->execute();
                  $rows = $statement->rowCount();
                  $columns = $statement->fetchAll();

                  if($results){
                    foreach($columns as $column){
                      $studentid = $column['studentid'];
                      $status = $column['computerlab'];
                      echo "
                      <tr>
                      <th>
                      {$studentid}
                      </th>
                      <th>
                      {$studentfullname}
                      </th>
                      <th>
                    '<span class='badge badge-sm bg-success ms-auto'>Verified</span>'
                      </th>
                      </tr>
                    ";
                    }
                  }
                }

                if($officerdepartment == 'librarian'){
                  $sql = "SELECT * FROM students WHERE computerlab = 1 AND status = 1";
                  $statement = $conn->prepare($sql);
                  $results = $statement->execute();
                  $rows = $statement->rowCount();
                  $columns = $statement->fetchAll();

                  if($results){
                    foreach($columns as $column){
                      $studentid = $column['studentid'];
                      $status = $column['computerlab'];

                      echo "
                      <tr>
                        <th>
                        {$studentid}
                        </th>
                        <th>
                        {$studentfullname}
                        </th>
                        <th>
                      '<span class='badge badge-sm bg-success ms-auto'>Verified</span>'
                        </th>
                        </tr>
                      ";
                    }
                  }

                } 

                if($officerdepartment == 'sportscoach'){
                  $sql = "SELECT * FROM students WHERE sportscoach = 1 AND status = 1";
                  $statement = $conn->prepare($sql);
                  $results = $statement->execute();
                  $rows = $statement->rowCount();
                  $columns = $statement->fetchAll();

                  if($results){
                    foreach($columns as $column){
                      $studentid = $column['studentid'];
                      $status = $column['computerlab'];

                      echo "
                      <tr>
                      <th>
                      {$studentid}
                      </th>
                      <th>
                      {$studentfullname}
                      </th>
                      <th>
                    '<span class='badge badge-sm bg-success ms-auto'>Verified</span>'
                      </th>
                      </tr>
                    ";
                    }
                  }
                }


                if($officerdepartment == 'laboratory'){
                  $sql = "SELECT * FROM students WHERE laboratory = 1 AND status = 1";
                  $statement = $conn->prepare($sql);
                  $results = $statement->execute();
                  $rows = $statement->rowCount();
                  $columns = $statement->fetchAll();

                  if($results){
                    foreach($columns as $column){
                      $studentid = $column['studentid'];
                      $status = $column['computerlab'];

                      echo "
                      <tr>
                      <th>
                      {$studentid}
                      </th>
                      <th>
                      {$studentfullname}
                      </th>
                      <th>
                    '<span class='badge badge-sm bg-success ms-auto'>Verified</span>'
                      </th>
                      </tr>
                    ";
                    }
                  }
                }

                if($officerdepartment == 'deanincharge'){
                  $sql = "SELECT * FROM students WHERE deanincharge = 1 AND status = 1";
                  $statement = $conn->prepare($sql);
                  $results = $statement->execute();
                  $rows = $statement->rowCount();
                  $columns = $statement->fetchAll();

                  if($results){
                    foreach($columns as $column){
                      $studentid = $column['studentid'];
                      $status = $column['computerlab'];

                      echo "
                      <tr>
                      <th>
                      {$studentid}
                      </th>
                      <th>
                      {$studentfullname}
                      </th>
                      <th>
                    '<span class='badge badge-sm bg-success ms-auto'>Verified</span>'
                      </th>
                      </tr>
                    ";
                    }
                  }
                }

                if($officerdepartment == 'halltutor'){
                  $sql = "SELECT * FROM students WHERE halltutor = 1 AND status = 1";
                  $statement = $conn->prepare($sql);
                  $results = $statement->execute();
                  $rows = $statement->rowCount();
                  $columns = $statement->fetchAll();

                  if($results){
                    foreach($columns as $column){
                      $studentid = $column['studentid'];
                      $status = $column['computerlab'];

                      echo "
                      <tr>
                        <th>
                        {$studentid}
                        </th>
                        <th>
                        {$studentfullname}
                        </th>
                        <th>
                      '<span class='badge badge-sm bg-success ms-auto'>Verified</span>'
                        </th>
                        </tr>
                      ";
                    }
                  }
                }
                
                
                ;?>


                        

              </tbody>
              </table>


                  </div>
                </div>
              </div>
            </div>
     </div>
          </div>
    </div>
     <?php //require_once("./includes/footer-ui.php");?>
     <?php require_once("./includes/bottom-files.php");?>