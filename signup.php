<?php 
session_start();

require_once("./config.php");
require_once("./includes/head.php");
require_once("./auxiliaries.php");

if(isset($_POST['submit'])){
  $fullname = sterilize($_POST['fullname']);
  $email = sterilize($_POST['email']);
  $password = sterilize($_POST['password']);
  $confirmpassword = sterilize($_POST['confirmpassword']);

  //check if filds are not empty
  if(empty($fullname) && empty($email) && empty($password) && empty($confirmpassword)){
    $_SESSION['message'] = "All Fields are required...**";
    $_SESSION['alert'] = "alert alert-warning";
  } else{
    //check if password are the same and more than 6 digits
    if(strlen($password) > 6){
      //check if password are the same
      if($password == $confirmpassword){
          //hash password
            $password = password_hash($password, PASSWORD_BCRYPT);
            $sqlInsertUsers = "INSERT INTO users(fullname, email, password) VALUES('$fullname','$email','$password')";
            $statement = $conn->prepare($sqlInsertUsers);
            $results = $statement->execute();
            
            if($results){
              $_SESSION['fullname'] = $_POST['fullname'];
              $_SESSION['email'] = $_POST['email'];
              header("location: login.php");
          } else{
            $_SESSION['message'] = "Sorry!! Something Went Wrong!!";
            $_SESSION['alert'] = "alert alert-warning";
          }

      } else{
        $_SESSION['message'] = "Password Mismatch!!";
          $_SESSION['alert'] = "alert alert-warning";
      }

    } else{
      $_SESSION['message'] = "Password Should Be More Than 6 Digits and Should be the Same...**";
      $_SESSION['alert'] = "alert alert-warning";
    }
  }
}





?>

<body>
  <!-- ========== HEADER ========== -->
 

  <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN CONTENT ========== -->
  <main id="content" role="main">
    <!-- Form -->
    <div class="container content-space-3 content-space-t-lg-4 content-space-b-lg-3">
      <div class="flex-grow-1 mx-auto" style="max-width: 28rem;">
        <!-- Heading -->
        <div class="text-center mb-5 mb-md-7">
        <?php
            if(isset($_SESSION['message'])):?>
                <div class="<?= $_SESSION['alert'];?>">
                    <strong><?= $_SESSION['message'];?></strong>
                 </div>
        <?php endif;?>
          <h1 class="h2">Welcome to Front</h1>
          <p>Fill out the form to get started.</p>
        </div>
        <!-- End Heading -->

        <!-- Form -->
        <form action="" method="POST">
          <!-- Form -->
          <div class="mb-3">
            <label class="form-label" for="signupSimpleSignupEmail">Your Fullname</label>
            <input type="text" class="form-control form-control-lg" name="fullname" id="signupSimpleSignupEmail" placeholder="Kofi Musah" aria-label="email@site.com" required>
            <span class="invalid-feedback">Please enter a valid email address.</span>
          </div>
         
          <div class="mb-3">
            <label class="form-label" for="signupSimpleSignupEmail">Your email</label>
            <input type="email" class="form-control form-control-lg" name="email" id="signupSimpleSignupEmail" placeholder="email@site.com" aria-label="email@site.com" required>
            <span class="invalid-feedback">Please enter a valid email address.</span>
          </div>

          <div class="mb-3">
            <label class="form-label" for="signupSimpleSignupPassword">Password</label>

            <div class="input-group input-group-merge" data-hs-validation-validate-class>
              <input type="password" class="js-toggle-password form-control form-control-lg" name="password" id="signupSimpleSignupPassword" placeholder="8+ characters required" aria-label="8+ characters required" required data-hs-toggle-password-options='{
                         "target": [".js-toggle-password-target-1", ".js-toggle-password-target-2"],
                         "defaultClass": "bi-eye-slash",
                         "showClass": "bi-eye",
                         "classChangeTarget": ".js-toggle-passowrd-show-icon-1"
                       }'>
              <a class="js-toggle-password-target-1 input-group-append input-group-text" href="javascript:;">
                <i class="js-toggle-passowrd-show-icon-1 bi-eye"></i>
              </a>
            </div>

            <span class="invalid-feedback">Your password is invalid. Please try again.</span>
          </div>
          <!-- End Form -->

          <!-- Form -->
          <div class="mb-3">
            <label class="form-label" for="signupSimpleSignupConfirmPassword">Confirm password</label>

            <div class="input-group input-group-merge" data-hs-validation-validate-class>
              <input type="password" class="js-toggle-password form-control form-control-lg" name="confirmpassword" id="signupSimpleSignupConfirmPassword" placeholder="8+ characters required" aria-label="8+ characters required" required data-hs-validation-equal-field="#signupSimpleSignupPassword" data-hs-toggle-password-options='{
                       "target": [".js-toggle-password-target-1", ".js-toggle-password-target-2"],
                       "defaultClass": "bi-eye-slash",
                       "showClass": "bi-eye",
                       "classChangeTarget": ".js-toggle-passowrd-show-icon-2"
                     }'>
              <a class="js-toggle-password-target-2 input-group-append input-group-text" href="javascript:;">
                <i class="js-toggle-passowrd-show-icon-2 bi-eye"></i>
              </a>
            </div>

            <span class="invalid-feedback">Password does not match the confirm password.</span>
          </div>
          <!-- End Form -->

          <!-- Check -->
          <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="signupHeroFormPrivacyCheck" name="privacy" required>
            <label class="form-check-label small" for="signupHeroFormPrivacyCheck"> By submitting this form I have read and acknowledged the <a href=page-privacy.html>Privacy Policy</a></label>
            <span class="invalid-feedback">Please accept our Privacy Policy.</span>
          </div>
          <!-- End Check -->

          <div class="d-grid mb-3">
            <button name="submit" type="submit" class="btn btn-primary btn-lg">Sign up</button>
          </div>

          <div class="text-center">
            <p>Already have an account? <a class="link" href="page-login-simple.html">Log in here</a></p>
          </div>
        </form>
        <!-- End Form -->
      </div>
    </div>
    <!-- End Form -->
  </main>
  <!-- ========== END MAIN CONTENT ========== -->

  <!-- ========== FOOTER ========== -->
 <?php require_once("./includes/footer.php");?>

  <!-- ========== END FOOTER ========== -->

  <!-- ========== SECONDARY CONTENTS ========== -->
  <!-- Sign Up -->
  
        <!-- End Header -->

      
  <!-- ========== END SECONDARY CONTENTS ========== -->

 <?php require_once("./includes/bottom-files.php");?>