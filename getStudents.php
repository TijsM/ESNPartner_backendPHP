<?php

require_once(__DIR__.'/mappers/studentConnection.php');

$studentCon = new StudentConnection();

$studentsJson = new stdClass();

$resultFromDb = $studentCon->getAllStudents();

foreach ($resultFromDb as $row) {

    $id =  $row[0];
    $bio =  $row[1];
    $dateOfBirth=  $row[2];
    $course =  $row[3];
    $email =  $row[4];
    $firstName =  $row[5];
    $lastName =  $row[6];
    $homeUniversityId = $row[7];
    $upcomingUniversityId = $row[8];
    $password = $row[9];

    $studentsJson->$id = new stdClass();
    $studentsJson->$id->id = $id;
    $studentsJson->$id->bio = $bio;
    $studentsJson->$id->dateOfBirth = $dateOfBirth;
    $studentsJson->$id->course = $course;
    $studentsJson->$id->email = $email;
    $studentsJson->$id->firstName = $firstName;
    $studentsJson->$id->lastName = $lastName;
    $studentsJson->$id->homeUniversityId = $homeUniversityId;
    $studentsJson->$id->upcomingUniversityId = $upcomingUniversityId;
    $studentsJson->$id->password = $password;

}

echo json_encode($studentsJson, JSON_PRETTY_PRINT);

