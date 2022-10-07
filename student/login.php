<?php 

    session_start();
    ob_start();

require_once("./includes/head.php");
require_once("./config.php");
require_once("./auxiliaries.php");


if(isset($_POST['submit'])){
  $studentid = sterilize($_POST['studentid']);
  $password = sterilize($_POST['password']);

if(empty($password) && empty($studentid)){
  $_SESSION['message'] = "All Fields are required...**";
  $_SESSION['alert'] = "alert alert-warning";
} else {
  $sqlSelectEmail = "SELECT * from students WHERE studentid = '$studentid'";
  $statement = $conn->prepare($sqlSelectEmail);
  $results = $statement->execute();
  $rows = $statement->rowCount();
  $columns = $statement->fetchAll();

  if($results){    
      if($rows > 0){
          foreach($columns as $column){
            //verify password
            if($password == $column['password']){
              $_SESSION['studentid'] = $_POST['studentid'];
              header("location: index.php");
              ob_end_flush();
            } else{
              $_SESSION['message'] = "Wrong Password!! Try again!!";
              $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
            }
          }
      } else {
        $_SESSION['message'] = "Sorry!! Email Not Registered!!";
        $_SESSION['alert'] = "alert alert-danger";
      }
  } else{
    $_SESSION['message'] = "Sorry!! Try Again Later!! Something went wrong";
    $_SESSION['alert'] = "alert alert-danger";
  }
} 

}









?>
<body class="d-flex align-items-center min-h-100">
  <!-- ========== HEADER ========== -->
  <header id="header" class="navbar navbar-expand navbar-light navbar-absolute-top">
    <div class="container-fluid">
      <nav class="navbar-nav-wrap">
        <!-- White Logo -->
        <!-- <a class="navbar-brand d-none d-lg-flex" href="index-2.html" aria-label="Front"> -->
          <!-- <img class="navbar-brand-logo" src="assets/svg/logos/logo-white.svg" alt="Logo"> -->
        <!-- </a> -->
        <!-- End White Logo -->

        <!-- Default Logo -->
        <!-- <a class="navbar-brand d-flex d-lg-none" href="index-2.html" aria-label="Front"> -->
          <!-- <img class="navbar-brand-logo" src="assets/svg/logos/logo.svg" alt="Logo"> -->
        <!-- </a> -->
        <!-- End Default Logo -->

        <div class="ms-auto">
          <a class="link link-sm link-secondary" href="index-2.html">
            <!-- <i class="bi-chevron-left small ms-1"></i> Go to main -->
          </a>
        </div>
      </nav>
    </div>
  </header>
  <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN CONTENT ========== -->
  <main id="content" role="main" class="flex-grow-1">
    <!-- Form -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-5 col-xl-4 d-none d-lg-flex justify-content-center align-items-center min-vh-lg-100 position-relative bg-success" style="background-image: url(assets/svg/components/wave-pattern-light.svg);">
          <div class="flex-grow-1 p-5">
            <!-- Blockquote -->
            <figure class="text-center">
              <div class="mb-4">
                <!-- <img class="avatar avatar-xl avatar-4x3" src="assets/svg/brands/mailchimp-white.svg" alt="Logo"> -->
              </div>

             

              <figcaption class="blockquote-footer blockquote-light">
                <div class="mb-3">
                  <img class="avatar avatar-circle" src="assets/img/160x160/img9.jpg" alt="Image Description">
                </div>

                  STUDENT LOGIN
                <span class="blockquote-footer-source">Online Clearance | Student</span>
              </figcaption>
            </figure>
            <!-- End Blockquote -->

            <!-- Clients -->
            <div class="position-absolute start-0 end-0 bottom-0 text-center p-5">
              <div class="row justify-content-center">
                <div class="col text-center py-3">
                  <!-- <img class="avatar avatar-lg avatar-4x3" src="assets/svg/brands/fitbit-white.svg" alt="Logo"> -->
                </div>
                <!-- End Col -->

                <div class="col text-center py-3">
                  <!-- <img class="avatar avatar-lg avatar-4x3" src="assets/svg/brands/business-insider-white.svg" alt="Logo"> -->
                </div>
                <!-- End Col -->

                <div class="col text-center py-3">
                  <!-- <img class="avatar avatar-lg avatar-4x3" src="assets/svg/brands/capsule-white.svg" alt="Logo"> -->
                </div>
                <!-- End Col -->
              </div>
              <!-- End Row -->
            </div>
            <!-- End Clients -->
          </div>
        </div>
        <!-- End Col -->

        <div class="col-lg-7 col-xl-8 d-flex justify-content-center align-items-center min-vh-lg-100">
          <div class="flex-grow-1 mx-auto" style="max-width: 28rem;">
            <!-- Heading -->
            <div class="text-center mb-5 mb-md-7">
            <?php
            if(isset($_SESSION['message'])):?>
                <div class="<?= $_SESSION['alert'];?>"  role="alert">
                    <strong><?= $_SESSION['message'];?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
        <?php endif;?>
              <h1 class="h2">Welcome back</h1>
              <p>Login to manage your account.</p>
            </div>
            <!-- End Heading -->

            <!-- Form -->
            <form action="" method="POST">
              <!-- Form -->
              <div class="mb-4">
                <label class="form-label" for="signupModalFormLoginEmail">Your email</label>
                <input type="text" class="form-control form-control-lg" name="studentid" id="signupModalFormLoginEmail" placeholder="email@site.com" aria-label="email@site.com" required>
                <span class="invalid-feedback">Please enter a valid email address.</span>
              </div>
              <!-- End Form -->

              <!-- Form -->
              <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center">
                  <label class="form-label" for="signupModalFormLoginPassword">Password</label>

                 
                </div>

                <div class="input-group input-group-merge" data-hs-validation-validate-class>
                  <input type="password" class="js-toggle-password form-control form-control-lg" name="password" id="signupModalFormLoginPassword" placeholder="8+ characters required" aria-label="8+ characters required" required minlength="8" data-hs-toggle-password-options='{
                         "target": "#changePassTarget",
                         "defaultClass": "bi-eye-slash",
                         "showClass": "bi-eye",
                         "classChangeTarget": "#changePassIcon"
                       }'>
                  <a id="changePassTarget" class="input-group-append input-group-text" href="javascript:;">
                    <i id="changePassIcon" class="bi-eye"></i>
                  </a>
                </div>

                <span class="invalid-feedback">Please enter a valid password.</span>
              </div>
              <!-- End Form -->

              <div class="d-grid mb-3">
                <button name="submit" type="submit" class="btn btn-success btn-lg">Log in</button>
              </div>

              <div class="text-center">
               
              </div>
            </form>
            <!-- End Form -->
          </div>
        </div>
        <!-- End Col -->
      </div>
      <!-- End Row -->
    </div>
    <!-- End Form -->
  </main>
  <!-- ========== END MAIN CONTENT ========== -->
  <script>
    $(".alert").alert('close')
    </script>


  <?php require_once("./includes/bottom-files.php");?>