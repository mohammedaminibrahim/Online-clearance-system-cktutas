<?php

require_once("./config.php");

//clean POST vars
function sterilize($element){
    return trim(htmlspecialchars($element));
}

//total number of students
$sqlTotalNumberOfStudent = "SELECT * FROM students";
$statement = $conn->prepare($sqlTotalNumberOfStudent);
$results = $statement->execute();
$totalNumberOfStudent = $statement->rowCount();


//total number of officers
$sqlTotalNumberOfOfficer = "SELECT * FROM students";
$statement = $conn->prepare($sqlTotalNumberOfOfficer);
$results = $statement->execute();
$totalNumberOfOfficer = $statement->rowCount();


//total number of cleared Students
$sqlTotalNumberOfClearedStudents = "SELECT * FROM students WHERE computerlab = 1 AND accountant = 1 AND librarian = 1 AND
sportscoach = 1 AND laboratory = 1 AND deanincharge = 1 AND halltutor = 1";
$statement = $conn->prepare($sqlTotalNumberOfClearedStudents);
$results = $statement->execute();
$totalNumberOfClearedStudents = $statement->rowCount();




;?>