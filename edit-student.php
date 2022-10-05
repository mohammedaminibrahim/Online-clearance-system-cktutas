<?php
    session_start();
    if(!isset($_SESSION['email']) OR $_SESSION['email'] == 0){
        header("location: login.php");
    }

    require_once("./config.php");
    require_once("./auxiliaries.php");

    $id = $_GET['id'];

    $sqlSelectforEdit = "SELECT * FROM students WHERE id='$id'";
    $statement = $conn->prepare($sqlSelectforEdit);
    $results = $statement->execute();
    $rows = $statement->rowCount();
    $columns = $statement->fetchAll();

    if($results){
        foreach($columns as $row){
            $studentid = $row['studentid'];
            $studentfullname = $row['studentfullname'];
            $studentdepartment = $row['studentdepartment'];
            $studentprogramme = $row['studentprogramme'];
            $date = $row['date'];
            $gender = $row['gender'];

            if(isset($_POST['editbtn'])){

                $studentid = $_POST['studentid'];
                $studentfullname = $_POST['studentfullname'];
                $studentdepartment = $_POST['studentdepartment'];
                $studentprogramme = $_POST['studentprogramme'];
                $date = $_POST['date'];
                $gender = $_POST['gender'];

                $sqlUpdate = "UPDATE students SET studentid = '$studentid', studentfullname = '$studentfullname', studentdepartment = '$studentdepartment',
            studentprogramme = '$studentprogramme', date = '$date', gender = '$gender'";
            $statement = $conn->prepare($sqlUpdate);
            $results = $statement->execute();

            if($results){
                header("location: view-students.php");
                $_SESSION['message'] = "Student Details Updated Successfully!!";
                $_SESSION['alert'] = "alert alert-success";
            } else {
                $_SESSION['message'] = "Sorry!! Something went wrong!!";
                $_SESSION['alert'] = "alert alert-danger";
            }
            }
            
        }
    } else{
        $_SESSION['message'] = "All Fields are required!!";
        $_SESSION['alert'] = "alert alert-danger";
    }

   


;?>

<?php require_once("./includes/head-ui.php");?>
  <body>
<?php require_once("./includes/side-bar-ui.php");?>
    <?php require_once("./includes/header-ui.php");?>
     <div class="container">
        <h4>Edit Students</h4>
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
                            <input name="studentid" value="<?= $studentid;?>" class="form-control is-valid" id="validationServer01" type="text" placeholder="Enter Department here" required="">
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="validationServer01">Student FullName</label>
                            <input name="studentfullname" value="<?= $studentfullname;?>"class="form-control is-valid" id="validationServer01" type="text" placeholder="Enter Department here" required="">
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="validationServer04">Programme</label>
                            <select name="studentdepartment" value="<?= $studentdepartment;?>" class="form-select is-valid" id="validationServer04" aria-describedby="validationServer04Feedback" required="">
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
                            <input name="studentprogramme" value="<?= $studentprogramme;?>" class="form-control is-valid" id="validationServer01" type="text" placeholder="Enter Department here" required="">
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="validationServer01">Date</label>
                            <input name="date" value="<?= $date;?>" class="form-control is-valid" id="validationServer01" type="date" placeholder="Enter Department here" required="">
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        
                        
                          <div class="col-md-3">
                            <label class="form-label" for="validationServer04">Gender</label>
                            <select name="gender" value="<?= $gender;?>" class="form-select is-valid" id="validationServer04" aria-describedby="validationServer04Feedback" required="">
                              <option selected="" disabled="" value="">Choose...</option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                            </select>
                            <div class="invalid-feedback" id="validationServer04Feedback">Please select a valid state.</div>
                          </div>
                          
                          <div class="col-12">
                            <button name="editbtn" class="btn btn-primary" type="submit">Update</button>
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