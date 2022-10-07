<?php

    ob_start();
    require_once("./config.php");
    $id = $_GET['id'];
if(isset($_GET[$id])){
    $var = 1;
    $sqlUpdateStatus = "UPDATE students SET studentclearancestatus = '$var'";
    $statement = $conn->prepare($sqlUpdateStatus);
    $results = $statement->execute();

    if($results){
      $_SESSION['message'] = "Cleared!!";
      $_SESSION['alert'] = "alert alert-success";
      $statuscode = " <span class='badge badge-sm bg-success ms-auto'>Verified</span>";
      header("location: request-form.php");
      ob_end_flush();
    } else{
      $_SESSION['message'] = "Oooopss!! Something went wrong";
      $_SESSION['alert'] = "alert alert-danger";
    }
  }




;?>


<?php
            if(isset($_SESSION['message'])):?>
                <div class="<?= $_SESSION['alert'];?>"  role="alert">
                    <strong><?= $_SESSION['message'];?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
        <?php endif;?>