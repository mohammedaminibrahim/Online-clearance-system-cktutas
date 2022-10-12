<?php
    session_start();
    if(!isset($_SESSION['email']) OR $_SESSION['email'] == 0){
        header("location: login.php");
    }

    require_once("./config.php");
    require_once("./auxiliaries.php");

    if(isset($_POST['submit'])){
        $studentid = sterilize($_POST['studentid']);
        $studentfullname = sterilize($_POST['studentfullname']);
        $studentdepartment = sterilize($_POST['studentdepartment']);
        $studentprogramme = sterilize($_POST['studentprogramme']);
        $date = sterilize($_POST['date']);
        $gender = sterilize($_POST['gender']);
        $password = "12345678";

        if(!empty($studentid) && !empty($studentfullname) && !empty($studentdepartment) &&
         !empty($studentprogramme) && !empty($date) && !empty($gender) && !empty($password)){
            $slqInsert = "INSERT INTO students(studentid, studentfullname, studentdepartment,
            studentprogramme, date, gender, password) VALUES('$studentid',' $studentfullname',
            '$studentdepartment','$studentprogramme','$date','$gender','$password')";
            $statement = $conn->prepare($slqInsert);
            $results = $statement->execute();

            if($results){
                header("location: view-students.php");
                $_SESSION['message'] = "Student Submitted Successfully!!";
                $_SESSION['alert'] = "alert alert-primary";
            } else{
                $_SESSION['message'] = "Sorry!! Something went wrong!! Try Again!!";
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
        <h4>Create New Students</h4>
            <?php
                if(isset($_SESSION['message'])):?>
                    <div class="<?= $_SESSION['alert'];?>"  role="alert">
                        <strong><?= $_SESSION['message'];?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            <?php endif;?>
        <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1054">
                        <form action="" method="POST" class="row g-3">
                          <div class="col-md-4">
                            <label class="form-label" for="validationServer01">Student ID</label>
                            <input name="studentid" class="form-control is-valid" id="validationServer01" type="text" placeholder="Enter Department here" required="">
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="validationServer01">Student FullName</label>
                            <input name="studentfullname" class="form-control is-valid" id="validationServer01" type="text" placeholder="Enter Department here" required="">
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="validationServer04">Programme</label>
                            <select name="studentdepartment" class="form-select is-valid" id="validationServer04" aria-describedby="validationServer04Feedback" required="">
                            <option selected='' disabled='' value=''>Choose...</option>
                                <?php
                                    $sqlSelectDepartment = "SELECT * FROM department";
                                    $statement = $conn->prepare($sqlSelectDepartment);
                                    $results = $statement->execute();
                                    $rows = $statement->rowCount();
                                    $columns = $statement->fetchAll();

                                    if($results){
                                        foreach($columns as $column){
                                            $id = $column['id'];
                                            $departmentname = $column['departmentname'];

                                            echo "
                                           
                                            <option value='{$departmentname}'> {$departmentname}</option>
                                            
                                            ";

                                        }
                                    } else{
                                        $_SESSION['message'] = "Sorry!! Something went wrong!! Try Again!!";
                                        $_SESSION['alert'] = "alert alert-danger";
                                    }


                                
                                
                                ;?>
                             </select>
                            <div class="invalid-feedback" id="validationServer04Feedback">Please select a valid state.</div>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="validationServer01">Programme</label>
                            <input name="studentprogramme" class="form-control is-valid" id="validationServer01" type="text" placeholder="Enter Department here" required="">
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="validationServer01">Date</label>
                            <input name="date" class="form-control is-valid" id="validationServer01" type="date" placeholder="Enter Department here" required="">
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        
                        
                          <div class="col-md-3">
                            <label class="form-label" for="validationServer04">Gender</label>
                            <select name="gender" class="form-select is-valid" id="validationServer04" aria-describedby="validationServer04Feedback" required="">
                              <option selected="" disabled="" value="">Choose...</option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                            </select>
                            <div class="invalid-feedback" id="validationServer04Feedback">Please select a valid state.</div>
                          </div>
                          
                          <div class="col-12">
                            <button name="submit" class="btn btn-primary" type="submit">Submit form</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
     </div>
          </div>
    </div>
     <?php require_once("./includes/footer-ui.php");?>
     <?php require_once("./includes/bottom-files.php");?>