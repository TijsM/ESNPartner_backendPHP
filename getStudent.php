<?php

require_once('StudentConnection.php');

$studentCon = new StudentConnection();

$StudentJson = new stdClass();

$idParam = $_GET['id'];

$resultFromDb = $studentCon->getStudent($idParam);


    
$id =  $resultFromDb['studentId'];
$bio =  $resultFromDb['bio'];
$dateOfBirth =  $resultFromDb['dateOfBirth'];
$course =  $resultFromDb['course'];
$email =  $resultFromDb['email'];
$firstName =  $resultFromDb['firstName'];
$lastName =  $resultFromDb['lastName'];
$homeUniversityId = $resultFromDb['homeUniversityId'];
$upcomingUniversityId = $resultFromDb['upcomingUniversityId'];
$password = $resultFromDb['password'];


$StudentJson->$id = new stdClass();
$StudentJson->$id->id = $id;
$StudentJson->$id->bio = $bio;
$StudentJson->$id->dateOfBirth = $dateOfBirth;
$StudentJson->$id->course = $course;
$StudentJson->$id->email = $email;
$StudentJson->$id->firstName = $firstName;
$StudentJson->$id->lastName = $lastName;
$StudentJson->$id->homeUniversityId = $homeUniversityId;
$StudentJson->$id->upcomingUniversityId = $upcomingUniversityId;
$StudentJson->$id->password = $password;


echo json_encode($StudentJson, JSON_PRETTY_PRINT);
