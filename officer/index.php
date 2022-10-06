<?php
    session_start();
    if(!isset($_SESSION['officerid']) OR $_SESSION['officerid'] == 0){
        header("location: login.php");
    }


;?>

<?php require_once("./includes/head-ui.php");?>
  <body>
<?php require_once("./includes/side-bar-ui.php");?>
    <?php require_once("./includes/header-ui.php");?>
      <?php require_once("./includes/dashboard-ui.php");?>
        
     

          </div>
    </div>
     <?php require_once("./includes/footer-ui.php");?>
     <?php require_once("./includes/bottom-files.php");?>