<?php
    session_start();
    if(!isset($_SESSION['email']) OR $_SESSION['email'] == 0){
        header("location: login.php");
    }

    require_once("./config.php");
    require_once("./auxiliaries.php");

    if(isset($_POST['addfees'])){
        $feesamount = sterilize($_POST['feesamount']);
        $studentdepartment = sterilize($_POST['studentdepartment']);

        if(!empty($feesamount) && !empty($studentdepartment)){
            $sqlInsertFees = "INSERT INTO fees(feesamount, department) 
            VALUES(:feesamount, :studentdepartment)";
            $statement = $conn->prepare($sqlInsertFees);
            $results = $statement->execute(
                array(
                    ':feesamount' => $feesamount,
                    ':studentdepartment' => $studentdepartment
                )
            );

            if($results){
                $_SESSION['message'] = "Fees Added Successfully!";
                $_SESSION['alert'] = "alert alert-primary";
            } else{
                $_SESSION['message'] = "Sorry!! Something went wrong!";
                $_SESSION['alert'] = "alert alert-danger";
            }
        } else {
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
        <h4>Create Fees</h4>
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
                            <label class="form-label" for="validationServer01">Amount</label>
                            <input name="feesamount" class="form-control is-valid" id="validationServer01" type="number" placeholder="Enter Department here" required="">
                            
                          </div>
                          
                          <div class="col-md-4">
                            <label class="form-label" for="validationServer04">Department</label>
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
                        
                          <div class="col-12">
                            <button name="addfees" class="btn btn-primary" type="submit">Submit form</button>
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