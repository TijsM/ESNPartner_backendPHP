<?php
require_once(__DIR__ . '/mappers/studentConnection.php');
require_once(__DIR__ . '/help-methods/tokenChecker.php');
require_once(__DIR__ . '/help-methods/sendErrorMessage.php');

if (checkToken()) {
    $studentCon = new StudentConnection();

    $studentId = $_POST['studentId'];

    $bio = $_POST['bio'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $course = $_POST['course'];
    $email = $_POST['email'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $homeUniversityId = $_POST['homeUniversityId'];
    $upcomingUniversityId = $_POST['upcomingUniversityId'];
    $password = $_POST['password'];


    $studentCredentials = array(
        'studentId' => $studentId,
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
    
    $studentCon->editStudent($studentCredentials);
} else {
    echo printErrorMessage('token is not valid', __LINE__);
}
