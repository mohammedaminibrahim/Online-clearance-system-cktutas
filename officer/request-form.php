<?php
    session_start();
    // if(!isset($_SESSION['email']) OR $_SESSION['email'] == 0){
    //     header("location: login.php");
    // }

    require_once("./config.php");
    require_once("./auxiliaries.php");



;?>

<?php require_once("./includes/head-ui.php");?>
  <body>
<?php require_once("./includes/side-bar-ui.php");?>
    <?php require_once("./includes/header-ui.php");?>
     <div class="container">
        <h4>View Clearance Request</h4>
        

                    
          
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
                    <th scope="col">Student Name</th>
                    <th scope="col">Student ID</th>
                    <th scope="col">Department</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                      $sqlSelectStudentsForOfficer = "SELECT * FROM students";
                      $statement = $conn->prepare($sqlSelectStudentsForOfficer);
                      $results = $statement->execute();
                      $rows = $statement->rowCount();
                      $columns = $statement->fetchAll();

                      if($results){
                        foreach($columns as $column){
                          $id = $column['id'];
                          $studentfullname = $column['studentfullname'];
                          $studentid = $column['studentid'];
                          $studentdepartment = $column['studentdepartment'];
                          $studentclearancestatus = $column['studentclearancestatus'];

                         

                          //if cleared button is clicked
                         
                      if(isset($_POST['clear'])){
                        $var = 1;
                        $sqlUpdateStatus = "UPDATE students SET studentclearancestatus = '$var'";
                        $statement = $conn->prepare($sqlUpdateStatus);
                        $results = $statement->execute();

                        if($results){
                          $_SESSION['message'] = "Cleared!!";
                          $_SESSION['alert'] = "alert alert-success";
                          $statuscode = " <span class='badge badge-sm bg-success ms-auto'>Verified</span>";
                        } else{
                          $_SESSION['message'] = "Oooopss!! Something went wrong";
                          $_SESSION['alert'] = "alert alert-danger";
                        }
                      }


                      
                        //decline
                        if(isset($_POST['decline'])){
                          $var = 0;
                          $sqlUpdateStatus = "UPDATE students SET studentclearancestatus = '$var'";
                          $statement = $conn->prepare($sqlUpdateStatus);
                          $results = $statement->execute();
  
                          if($results){
                            $_SESSION['message'] = "Declined!!";
                            $_SESSION['alert'] = "alert alert-success";
                            $statuscode = " <span class='badge badge-sm bg-warning ms-auto'>Unverified</span>";
                          } else{
                            $_SESSION['message'] = "Oooopss!! Something went wrong";
                            $_SESSION['alert'] = "alert alert-danger";
                          }

                        }


                        if($column['studentclearancestatus'] == 0){
                          $statuscode = " <span class='badge badge-sm bg-warning ms-auto'>Unverified</span>";
                        } elseif($column['studentclearancestatus'] == 1){
                          $statuscode = " <span class='badge badge-sm bg-success ms-auto'>Verified</span>";
                        } else{
                          $statuscode = " <span class='badge badge-sm bg-primary ms-auto'>On hold</span>";
                        }

                          echo "
                          <tr>
                          <form method='post'>
                            <th scope='row'>{$id}</th>
                            <td>{$studentfullname} </td>
                            <td> {$studentid}</td>
                            <td> {$studentdepartment}</td>
                            <td> {$statuscode}</td>
                            <td> 
                              
                            <a href='request-form.php?id={$id}' name='clear' role='button' class='btn btn-warning'>clear</a>
                            <a href='request-form.php?id={$id}' name='decline' role='button' class='btn btn-success'>Decline</a>

                             </form>
                              
                            </td>
                          </tr>
                          ";
                        }
                      } else{
                        $_SESSION['message'] = "Ooopss!! Something went wrong!!";
                        $_SESSION['alert'] = "alert alert-warning";
                      }

          
                      // echo "
                      // <tr>
                      // <form method='post'>
                      //   <th scope='row'>{$id}</th>
                      //   <td>{$studentfullname} </td>
                      //   <td> {$studentid}</td>
                      //   <td> {$studentdepartment}</td>
                      //   <td> {$statuscode}</td>
                      //   <td> 
                        
                      //       <input type='submit' value='Clear' name='clear' role='button' class='btn btn-warning'>
                      //       <input type='submit' value='Decline' name='decline' role='button' class='btn btn-success'>
                      //    </form>
                          
                      //   </td>
                      // </tr>
                      // ";

                      //update to clear student
                  
                     $officerid = $_SESSION['officerid'];
                     $officerdepartment = $_SESSION['officerdepartment'];

                     if(isset($_SESSION['officerid']) && $officerdepartment == "computerlab"){
                      $finalUpdate = "UPDATE students SET computerlab = 1";
                      $statement = $conn->prepare($finalUpdate);
                      $results = $statement->execute();

                      
                     } elseif(isset($_SESSION['officerid']) && $officerdepartment == "accountant") {
                      $finalUpdate = "UPDATE students SET accountant = 1";
                      $statement = $conn->prepare($finalUpdate);
                      $results = $statement->execute();

                     } elseif(isset($_SESSION['officerid']) && $officerdepartment == "librarian"){
                        $finalUpdate = "UPDATE students SET librarian = 1";
                        $statement = $conn->prepare($finalUpdate);
                        $results = $statement->execute();

                     } elseif((isset($_SESSION['officerid']) && $officerdepartment == "sportscoach")){

                        $finalUpdate = "UPDATE students SET sportscoach = 1";
                        $statement = $conn->prepare($finalUpdate);
                        $results = $statement->execute();

                     } elseif((isset($_SESSION['officerid']) && $officerdepartment == "laboratory")){

                        $finalUpdate = "UPDATE students SET laboratory = 1";
                        $statement = $conn->prepare($finalUpdate);
                        $results = $statement->execute();

                    } elseif((isset($_SESSION['officerid']) && $officerdepartment == "deanincharge")){
                      
                      $finalUpdate = "UPDATE students SET deanincharge = 1";
                      $statement = $conn->prepare($finalUpdate);
                      $results = $statement->execute();

                    } elseif((isset($_SESSION['officerid']) && $officerdepartment == "halltutor")){
                      
                        $finalUpdate = "UPDATE students SET halltutor = 1";
                        $statement = $conn->prepare($finalUpdate);
                        $results = $statement->execute();
                    } else {
                      $_SESSION['message'] = "Sorry!! Something went wrong";
                      $_SESSION['alert'] = "alert alert-danger";
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
     <?php require_once("./includes/footer-ui.php");?>
     <?php require_once("./includes/bottom-files.php");?>