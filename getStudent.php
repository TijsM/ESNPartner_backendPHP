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
$currentCity =  $resultFromDb['currentCity'];
$currentCountry =  $resultFromDb['currentCountry'];
$currentSchool =  $resultFromDb['currentSchool'];
$email =  $resultFromDb['email'];
$firstName =  $resultFromDb['firstName'];
$lastName =  $resultFromDb['lastName'];
$upcomingCity =  $resultFromDb['upcomingCity'];
$upcomingCountry =  $resultFromDb['upcomingCountry'];
$upcomingSchool =  $resultFromDb['upcomingSchool'];

$StudentJson->$id = new stdClass();
$StudentJson->$id->id = $id;
$StudentJson->$id->bio = $bio;
$StudentJson->$id->dateOfBirth = $dateOfBirth;
$StudentJson->$id->course = $course;
$StudentJson->$id->currentCity = $currentCity;
$StudentJson->$id->currentCountry = $currentCountry;
$StudentJson->$id->currentSchool = $currentSchool;
$StudentJson->$id->email = $email;
$StudentJson->$id->firstName = $firstName;
$StudentJson->$id->lastName = $lastName;
$StudentJson->$id->upcomingCity = $upcomingCity;
$StudentJson->$id->upcomingCountry = $upcomingCountry;
$StudentJson->$id->upcomingSchool = $upcomingSchool;


echo json_encode($StudentJson, JSON_PRETTY_PRINT);
