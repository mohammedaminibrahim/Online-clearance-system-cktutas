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
        <h4>Request Clearance Status</h4>
        

                    
          
        <p class="text-primary">
           
        </p>
        
        <div class="container">
            
        </div>

                <?php
                $studentid = $_SESSION['studentid'];
                    $sqlStatus = "SELECT * FROM students WHERE studentid = :studentid";
                    $statement = $conn->prepare($sqlStatus);
                    $results = $statement->execute([
                        ':studentid' => $studentid
                    ]);
                    $columns = $statement->fetchAll();

                    if($results){
                        foreach($columns as $column){
                            $status = $column['status'];
                            $computerlab = $column['computerlab'];
                            $accountant = $column['accountant'];
                            $librarian = $column['librarian'];
                            $sportscoach = $column['sportscoach'];
                            $laboratory = $column['laboratory'];
                            $deanincharge = $column['deanincharge'];
                            $halltutor = $column['halltutor'];

                            if($computerlab == 1 && $accountant == 1 && $librarian == 1 && $sportscoach == 1
                            && $laboratory == 1 && $deanincharge == 1 && $halltutor == 1){
                              $sqlUpdate = "UPDATE students SET status = 1";
                            $status = 1;
                            } else{
                              $sqlUpdate = "UPDATE students SET status = 0";
                              $status = 0;
                            }

                            
                        }

                        if($status == 0){
                            $statusCode = "Not Verified";
                            $statusalert = "alert alert-danger";
                            $statutitle = "Pending";
                            $statusmessage = "Please hold on for a while! Clearance in progress!!";
                        } elseif($status == 1){
                            $statusCode = "Verified";
                            $statutitle = "<strong>"."Congratulation!!"."<strong>". "You have successfully been cleared!";
                            $statusalert = "alert alert-success";
                            $statusmessage = "Take a moment and savor your reward after all of those late nights of studying, 
                            the fun you missed out on, and lack of sleep. Congratulations! on your Graduation!!";
                        }
                    } 

                
                
                ;?>


                <div class="<?= $statusalert;?>" role="alert">
                <h4 class="alert-heading"><?php echo $statusCode;?></h4>
                <p><?php echo $statutitle;?></p>
                <hr>
                <p class="mb-0">
                <?php echo $statusmessage;?>
                </p>
                </div>



                <div class="tab-content rounded-bottom">
                  <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-681">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Computer Lab</th>
                          <th scope="col">Accountant</th>
                          <th scope="col">Librarian</th>
                          <th scope="col">Sports Coach</th>
                          <th scope="col">Laboratory</th>
                          <th scope="col">Dean In Charge</th>
                          <th scope="col">Hall Tutor</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            $slqGetAllOffices = "SELECT * FROM students WHERE studentid = '$studentid'";
                            $statement = $conn->prepare($slqGetAllOffices);
                            $results = $statement->execute();
                            $columns = $statement->fetchAll();
                            $rows = $statement->rowCount();
                            if($results){
                              foreach($columns as $column){
                                $id = $column['studentid'];
                                $computerlab =$column['computerlab'];
                                $accountant =$column['accountant'];
                                $librarian =$column['librarian'];
                                $sportscoach =$column['sportscoach'];
                                $laboratory =$column['laboratory'];
                                $deanincharge =$column['deanincharge'];
                                $halltutor =$column['halltutor'];

                                echo "
                                <tr>
                                <th scope='row'>{$id}</th>
                                <td>{$accountant}</td>
                                <td>{$accountant}</td>
                                <td>{$accountant}</td>
                                <td>{$accountant}</td>
                                <td>{$accountant}</td>
                                <td>{$accountant}</td>
                                <td>{$accountant}</td>
                               
                              </tr>
                                
                                ";
                              }
                            } else{
                              $_SESSION['message'] = "Something went wrong";
                              $_SESSION['alert'] = "alert alert-warning";
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
          </div>
    </div>
     <?php require_once("./includes/footer-ui.php");?>
     <?php require_once("./includes/bottom-files.php");?>