<?php

require_once('StudentConnection.php');

$studentCon = new StudentConnection();


$bio = $_POST['bio'];
$dateOfBirth = $_POST['dateOfBirth'];
$course = $_POST['course'];
$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$homeUniversityId = $_POST['homeUniversityId'];
$upcomingUniversityId = $_POST['upcomingUniversityId'];

$userCredentials = array(
    'bio' => $bio,
    'dateOfBirth' => $dateOfBirth,
    'course' => $course,
    'email' => $email,
    'firstName' => $firstName,
    'lastName' => $lastName,
    'homeUniversityId' => $homeUniversityId,
    'upcomingUniversityId' => $upcomingUniversityId
);


$studentCon->addStudent($userCredentials);




