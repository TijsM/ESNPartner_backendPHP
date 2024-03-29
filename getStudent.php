<?php
require_once(__DIR__ . '/mappers/studentConnection.php');
require_once(__DIR__ . '/help-methods/tokenChecker.php');
require_once(__DIR__ . '/help-methods/sendErrorMessage.php');


if (checkToken()) {
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
} else {
    echo printErrorMessage('token is not valid', __LINE__);
}
