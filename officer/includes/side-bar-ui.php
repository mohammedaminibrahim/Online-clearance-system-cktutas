<?php

   
    //get student details
    require_once("../config.php");
    $officerid = $_SESSION['officerid'];
    $sqlStudentsInfo = "SELECT * FROM officers WHERE officerid = :officerid";
    $statement = $conn->prepare($sqlStudentsInfo);
    $results = $statement->execute([
      ':officerid' => $officerid
    ]);
    $columns = $statement->fetchAll();

    if($results){
      foreach($columns as $column){
        $id = $column['id'];
        $officerid = $column['officerid'];
        $fullname = $column['officerfullname'];
        $officerdepartment = $column['officerdepartment'];
        
      }
    } else{
      $_SESSION['message'] = "Sorry!! Try Again Later!! Something went wrong";
      $_SESSION['alert'] = "alert alert-danger";
    }

;?>

<style>
  .avatar {
  vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
}
</style>
<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
<div class="sidebar-brand d-none d-md-flex">
  <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
    <use xlink:href="assets/brand/coreui.svg#full"></use>
  </svg>
  <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
    <use xlink:href="assets/brand/coreui.svg#signet"></use>
  </svg>
</div>
<ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">

  <li class="nav-title"><?= $officerid;?> <span class="badge badge-sm bg-success ms-auto">NEW</span></li>
    <li class="nav-item">
    <div class="rounded-circle">
      <img src="././assets/img/officer.jpg" style="margin-left: 60px;" class="avatar" alt="" srcset="">
    </div>
    <div class="container">
    <p style="margin-left: 30px;" class="text-light"><?= $fullname;?> </p>
    <p style="margin-left: 30px;" class="text-light"> <?= $officerdepartment;?></p>

    
    </div>
    </li>
  <li class="nav-item"><a class="nav-link" href="././request-form.php">
      <svg class="nav-icon">
        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-cursor"></use>
      </svg> View Student</a></li>
  <li class="nav-item"><a class="nav-link" href="././view-status.php">
      <svg class="nav-icon">
        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
      </svg> Clear Students</a></li>

      <!-- <li class="nav-item"><a class="nav-link" href="././student-fees.php">
      <svg class="nav-icon">
        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-notes"></use>
      </svg> Fees & History</a></li> -->

      <li class="nav-item"><a class="nav-link" href="././logout.php">
      <svg class="nav-icon">
        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-notes"></use>
      </svg> Logout</a></li>
      
  
  
</ul>
<button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>