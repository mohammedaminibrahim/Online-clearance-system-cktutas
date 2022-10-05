<?php

require_once("./config.php");
$id = $_GET['id'];

if(isset($id)){
    $sqlDelete = "DELETE FROM fees WHERE id = '$id'";
    $statement = $conn->prepare($sqlDelete);
    $results = $statement->execute();

    if($results){
        header("location: view-fees.php");
        $_SESSION['message'] = "Fees Data Deleted Successfully!!";
        $_SESSION['alert'] = "alert alert-primary";
    } else{
        $_SESSION['message'] = "Sorry!! Something went wrong!!";
        $_SESSION['alert'] = "alert alert-danger";
    }
}


;?>