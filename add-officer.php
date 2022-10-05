<?php
    session_start();
    if(!isset($_SESSION['email']) OR $_SESSION['email'] == 0){
        header("location: login.php");
    }

    require_once("./config.php");
    require_once("./auxiliaries.php");

    if(isset($_POST['submit'])){
        $officerid = sterilize($_POST['officerid']);
        $officerfullname = sterilize($_POST['officerfullname']);
        $officerdepartment = sterilize($_POST['officerdepartment']);
        
        $officerpassword = "123456";

        if(!empty($officerid) && !empty($officerfullname)){
            $slqInsert = "INSERT INTO officers(officerid, officerpassword, officerfullname) 
            VALUES('$officerid','$officerpassword','$officerfullname')";
            $statement = $conn->prepare($slqInsert);
            $results = $statement->execute();

            if($results){
                $_SESSION['message'] = "officer Submitted Successfully!!";
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
        <h4>Create New Officer</h4>
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
                            <label class="form-label" for="validationServer01">Officer ID</label>
                            <input name="officerid" class="form-control is-valid" id="validationServer01" type="text" placeholder="Enter Department here" required="">
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="validationServer01">Officer FullName</label>
                            <input name="officerfullname" class="form-control is-valid" id="validationServer01" type="text" placeholder="Enter Department here" required="">
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="validationServer04">Department Incharge</label>
                            <select name="officerdepartment" class="form-select is-valid" id="validationServer04" aria-describedby="validationServer04Feedback" required="">
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