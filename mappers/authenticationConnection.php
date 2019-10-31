<?php

require_once(__DIR__ . '/../help-methods/connection.php');

class AuthenticationConnection
{
    function getLoginCredentials($email)
    {
        $db = new DB();
        $con = $db->connect();

        if ($con) {
            $stmt = $con->prepare("SELECT email, password, studentId FROM student WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $result = $stmt->fetch();

            $stmt = null;
            $db->disconnect($con);

            return $result;
        }
    }

    function saveToken($email, $token, $expirationDate)
    {
        $db = new DB();
        $con = $db->connect();

        if ($con) {
            $stmnt = $con->prepare("UPDATE student SET jwtToken = :token, expirationTime = :expirationDate WHERE email = :email");
            $stmnt->bindParam(':token', $token);
            $stmnt->bindParam(':expirationDate', $expirationDate);
            $stmnt->bindParam(':email', $email);
        }

        $stmnt->execute();
        $result = $stmnt->fetch();

        $stmnt = null;
        $db->disconnect($con);

        return $result;
    }

    function checkToken($id, $token)
    {
        $db = new DB();
        $con = $db->connect();

        if ($con) {
            $stmnt = $con->prepare("SELECT jwtToken, expirationTime FROM student WHERE studentId = :id");
            $stmnt->bindParam(':id', $id);
        }

        $stmnt->execute();
        $result = $stmnt->fetch();

        $stmnt = null;
        $db->disconnect($con);

        return $result;
    }

    function createUser($userCredentials)
    {
        $db = new DB();
        $con = $db->connect();

        if ($con) {
            $stmnt = $con->prepare("INSERT INTO `student`(`studentId`, `bio`, `dateOfBirth`, `course`, `email`, `firstName`, `lastName`, `homeUniversityId`, `upcomingUniversityId`, `password`) VALUES (NULL, :bio, :dateOfBirth, :course, :email, :firstName, :lastName, :homeUniversityId, :upcomingUniversityId, :password)");
            $stmnt->bindParam(':bio', $userCredentials['bio']);
            $stmnt->bindParam(':dateOfBirth', $userCredentials['dateOfBirth']);
            $stmnt->bindParam(':course', $userCredentials['course']);
            $stmnt->bindParam(':email', $userCredentials['email']);
            $stmnt->bindParam(':firstName', $userCredentials['firstName']);
            $stmnt->bindParam(':lastName', $userCredentials['lastName']);
            $stmnt->bindParam(':homeUniversityId', $userCredentials['homeUniversityId']);
            $stmnt->bindParam(':upcomingUniversityId', $userCredentials['upcomingUniversityId']);
            $stmnt->bindParam(':password', $userCredentials['password']);
        }

        $stmnt->execute();

        $stmt = null;
        $db->disconnect($con);
    }
}
