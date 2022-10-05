<?php
    session_start();
    if(!isset($_SESSION['email']) OR $_SESSION['email'] == 0){
        header("location: login.php");
    }


;?>