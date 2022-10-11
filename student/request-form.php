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
      $reportstatus = 1;

      if(!empty($accountant) && !empty($librarian) && !empty($computerlab) && 
      !empty($faslab) && !empty($sportscoach) && !empty($halltutor) && !empty($deanincharge)){
        $sqlInsertClearanceForm = "UPDATE students SET reportstatus = '$reportstatus' WHERE studentid = '$studentid'";
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
        <h4>Request Clearance Form</h4>
        

                    
          
        <p class="text-primary">
           
        </p>
        
        <div class="container">
            
        </div>
            <?php
                if(isset($_SESSION['message'])):?>
                    <div class="<?= $_SESSION['alert'];?>"  role="alert">
                        <strong><?= $_SESSION['message'];?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            <?php endif;?>


            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Department</th>
                    <th scope="col">Request</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                 <form action="" method="post">
                 <tr>
                    <th scope="row">1</th>
                    <td> Accountant</td>
                    <td>
                      <select name="accountant" class="form-select" id="validationServer04" aria-describedby="validationServer04Feedback" required="">
                        <option value="">Select</option>
                        <option value="1">Request</option>
                        <option value="0">Ignore</option>
                      </select>
                    </td>
                    <td>
                    <span class="badge badge-sm bg-success ms-auto">PENDING</span>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row">2</th>
                    <td> Librarian</td>
                    <td>
                      <select name="librarian" class="form-select" id="validationServer04" aria-describedby="validationServer04Feedback" required="">
                        <option value="">Select</option>
                        <option value="1">Request</option>
                        <option value="0">Ignore</option>
                      </select>
                    </td>
                    <td>
                    <span class="badge badge-sm bg-success ms-auto">PENDING</span>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row">3</th>
                    <td> Computer Laboratory</td>
                    <td>
                      <select name="computerlab" class="form-select" id="validationServer04" aria-describedby="validationServer04Feedback" required="">
                        <option value="">Select</option>
                        <option value="1">Request</option>
                        <option value="0">Ignore</option>
                      </select>
                    </td>
                    <td>
                    <span class="badge badge-sm bg-success ms-auto">PENDING</span>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row">4</th>
                    <td> Laboratory</td>
                    <td>
                      <select name="faslab" class="form-select" id="validationServer04" aria-describedby="validationServer04Feedback" required="">
                        <option value="">Select</option>
                        <option value="1">Request</option>
                        <option value="0">Ignore</option>
                      </select>
                    </td>
                    <td>
                    <span class="badge badge-sm bg-success ms-auto">PENDING</span>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row">5</th>
                    <td> Sports Coach</td>
                    <td>
                      <select name="sportscoach" class="form-select" id="validationServer04" aria-describedby="validationServer04Feedback" required="">
                        <option value="">Select</option>
                        <option value="1">Request</option>
                        <option value="0">Ignore</option>
                      </select>
                    </td>
                    <td>
                    <span class="badge badge-sm bg-success ms-auto">PENDING</span>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row">6</th>
                    <td> Hall Tutor</td>
                    <td>
                      <select name="halltutor" class="form-select" id="validationServer04" aria-describedby="validationServer04Feedback" required="">
                        <option value="">Select</option>
                        <option value="1">Request</option>
                        <option value="0">Ignore</option>
                      </select>
                    </td>
                    <td>
                    <span class="badge badge-sm bg-success ms-auto">PENDING</span>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row">7</th>
                    <td> Dean In Charger</td>
                    <td>
                      <select name="deanincharge" class="form-select" id="validationServer04" aria-describedby="validationServer04Feedback" required="">
                        <option value="">Select</option>
                        <option value="1">Request</option>
                        <option value="0">Ignore</option>
                      </select>
                    </td>
                    <td>
                    <span class="badge badge-sm bg-success ms-auto">PENDING</span>
                    </td>
                  </tr>

                  <?php
                    $disableVar = "";
                    $sqlGetRequest = "SELECT * FROM students WHERE studentid = '$studentid'";
                    $statement = $conn->prepare($sqlGetRequest);
                    $results = $statement->execute();
                    $rows = $statement->rowCount();
                    $columns = $statement->fetchAll();

                    foreach($columns as $column){
                      $reportstatus = $column['reportstatus'];
                      if($reportstatus == 1){
                        $disableVar = "disabled";
                        $btnName = "Request Sent Already";
                      } elseif($reportstatus == 0){
                        $disableVar = "";
                        $btnName = "Send Request";
                      }
                    }
                  ;?>
                  <input type="submit" name="sendresquest" value="<?=$btnName;?>" class="btn btn-primary" <?=$disableVar;?>>
                 </form>
                 
                </tbody>
              </table>


                  </div>
                </div>
              </div>
            </div>
     </div>
          </div>
    </div>
     <?php require_once("./includes/footer-ui.php");?>
     <?php require_once("./includes/bottom-files.php");?>