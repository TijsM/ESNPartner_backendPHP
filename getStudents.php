<?php

require_once('StudentConnection.php');

$studentCon = new StudentConnection();

$studentsJson = new stdClass();



$resultFromDb = $studentCon->getAllStudents();


foreach ($resultFromDb as $row) {

    $id =  $row[0];
    $bio =  $row[1];
    $dateOfBirth=  $row[2];
    $course =  $row[2];
    $currentCity =  $row[3];
    $currentCountry =  $row[4];
    $currentSchool =  $row[5];
    $email =  $row[6];
    $firstName =  $row[7];
    $lastName =  $row[8];
    $upcomingCity =  $row[9];
    $upcomingCountry =  $row[10];
    $upcomingSchool =  $row[11];

    $studentsJson->$id = new stdClass();
    $studentsJson->$id->id = $id;
    $studentsJson->$id->bio = $bio;
    $studentsJson->$id->dateOfBirth = $dateOfBirth;
    $studentsJson->$id->course = $course;
    $studentsJson->$id->currentCity = $currentCity;
    $studentsJson->$id->currentCountry = $currentCountry;
    $studentsJson->$id->currentSchool = $currentSchool;
    $studentsJson->$id->email = $email;
    $studentsJson->$id->firstName = $firstName;
    $studentsJson->$id->lastName = $lastName;
    $studentsJson->$id->upcomingCity = $upcomingCity;
    $studentsJson->$id->upcomingCountry=$upcomingCountry;
    $studentsJson->$id->upcomingSchool = $upcomingSchool;
}

echo json_encode($studentsJson, JSON_PRETTY_PRINT);







// $studentsJson->$row[0]->bio = $row[1];
// $studentsJson->$row[0]->dateOfBirth = $row[2];
// $studentsJson->$row[0]->couse = $row[3];
// $studentsJson->$row[0]->currentCity = $row[4];
// $studentsJson->$row[0]->currentCountry = $row[5];
// $studentsJson->$row[0]->currentSchool = $row[6];
