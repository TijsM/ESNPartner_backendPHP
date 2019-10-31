<?php

require_once(__DIR__ . '/mappers/authenticationConnection.php');
require_once(__DIR__ . '/mappers/studentConnection.php');
require_once(__DIR__ . '/help-methods/sendErrorMessage.php');
require_once(__DIR__.'/help-methods/generateToken.php');

$authCon = new AuthenticationConnection();
$studCon = new StudentConnection();

$bio = $_POST['bio'];
$dateOfBirth = $_POST['dateOfBirth'];
$course = $_POST['course'];
$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$homeUniversityId = $_POST['homeUniversityId'];
$upcomingUniversityId = $_POST['upcomingUniversityId'];
$password = $_POST['password'];


$userCredentials = array(
    'bio' => $bio,
    'dateOfBirth' => $dateOfBirth,
    'course' => $course,
    'email' => $email,
    'firstName' => $firstName,
    'lastName' => $lastName,
    'homeUniversityId' => $homeUniversityId,
    'upcomingUniversityId' => $upcomingUniversityId,
    'password' => $password
);

$authCon->createUser($userCredentials);

$token = generteToken();
$currentDateTime = new DateTime();
$expirationDate = $currentDateTime->modify('+1 hour');

$authCon->saveToken($email, $token, $expirationDate->format('Y-m-d H:i:s'));

$userFromDb = $studCon->getStudentByEmail($email);
$studentId = $userFromDb['studentId'];

$response = new stdClass();
$response->token = $token;
$response->expirationDate = $expirationDate->format('Y-m-d H:i:s');
$response->studentId = $studentId;


echo json_encode($response, JSON_PRETTY_PRINT);