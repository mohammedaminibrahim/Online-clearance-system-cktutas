<?php
    session_start();
    if(!isset($_SESSION['email']) OR $_SESSION['email'] == 0){
        header("location: login.php");
    }

    require_once("./config.php");
    require_once("./auxiliaries.php");

    if(isset($_POST['submit'])){
        $departmentname = sterilize($_POST['departmentname']);
        $faculty = sterilize($_POST['faculty']);

        //check if inputs are not empty
        if(!empty($departmentname) && !empty($faculty)){
            $sqlInsert = "INSERT INTO department(departmentname, faculty) VALUE('$departmentname','$faculty')";
            $statement = $conn->prepare($sqlInsert);
            $results = $statement->execute();

            if($results){
                $_SESSION['message'] = "Department Created Successfully!!";
                $_SESSION['alert'] = "alert alert-primary";
                header("location: index.php");
            } else{
                $_SESSION['message'] = "Something went wrong!! Try Again!!";
                $_SESSION['alert'] = "alert alert-danger";
            }


        } else{
            $_SESSION['message'] = "All Input Fields are required!!";
            $_SESSION['alert'] = "alert alert-danger";
        }
    }


;?>

<?php require_once("./includes/head-ui.php");?>
  <body>
<?php require_once("./includes/side-bar-ui.php");?>
    <?php require_once("./includes/header-ui.php");?>
     <div class="container">
        <h4>Create New Departments</h4>
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
                            <label class="form-label" for="validationServer01">Department Name</label>
                            <input name="departmentname" class="form-control is-valid" id="validationServer01" type="text" placeholder="Enter Department here" required="">
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        
                          <div class="col-md-3">
                            <label class="form-label" for="validationServer04">Faculty/School</label>
                            <select name="faculty" class="form-select is-valid" id="validationServer04" aria-describedby="validationServer04Feedback" required="">
                              <option selected="" disabled="" value="">Choose...</option>
                              <option value="scis">School of computing and Information Science</option>
                              <option>...</option>
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