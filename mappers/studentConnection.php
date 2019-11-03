<?php

require_once(__DIR__ . '/../help-methods/connection.php');

class StudentConnection
{
    function getAllStudents()
    {
        $db = new DB();
        $con = $db->connect();
        if ($con) {
            $studentsFromDatabase = array();
            $stmt = $con->prepare("SELECT * FROM student");
            $stmt->execute();

            while ($row = $stmt->fetch()) {
                array_push(
                    $studentsFromDatabase,
                    [
                        $row['studentId'],
                        $row['bio'],
                        $row['dateOfBirth'],
                        $row['course'],
                        $row['email'],
                        $row['firstName'],
                        $row['lastName'],
                        $row['homeUniversityId'],
                        $row['upcomingUniversityId'],
                        $row['password'],
                    ]
                );
            }

            $stmt = null;
            $db->disconnect($con);

            return $studentsFromDatabase;
        }
    }


    function getStudent($id)
    {

        $db = new DB();
        $con = $db->connect();
        if ($con) {
            $stmt = $con->prepare("SELECT * FROM student WHERE studentId = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $result = $stmt->fetch();

            $stmt = null;
            $db->disconnect($con);

            return $result;
        }
    }

    function getStudentByEmail($email)
    {
        $db = new DB();
        $con = $db->connect();

        if ($con) {
            $stmt = $con->prepare("SELECT * FROM student WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $result = $stmt->fetch();

            $stmt = null;
            $db->disconnect($con);

            return $result;
        }
    }


    function addStudent($userCredentials)
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

    function editStudent($userCredentials)
    {
        $db = new DB();
        $con = $db->connect();

        if ($con) {

            echo $userCredentials['studentId'];
            $stmnt = $con->prepare("
                UPDATE student
                SET 
                    bio = :bio, 
                    dateOfBirth = :dateOfBirth, 
                    course = :course, 
                    email = :email, 
                    firstName = :firstName, 
                    lastName = :lastName, 
                    homeUniversityId = :homeUniversityId,
                    upcomingUniversityId = :upcomingUniversityId
                WHERE
                    studentId = :id
            ");

            $stmnt->bindParam(':id', $userCredentials['studentId']);

            $stmnt->bindParam(':bio', $userCredentials['bio']);
            $stmnt->bindParam(':dateOfBirth', $userCredentials['dateOfBirth']);
            $stmnt->bindParam(':course', $userCredentials['course']);
            $stmnt->bindParam(':email', $userCredentials['email']);
            $stmnt->bindParam(':firstName', $userCredentials['firstName']);
            $stmnt->bindParam(':lastName', $userCredentials['lastName']);
            $stmnt->bindParam(':homeUniversityId', $userCredentials['homeUniversityId']);
            $stmnt->bindParam(':upcomingUniversityId', $userCredentials['upcomingUniversityId']);


            $stmnt->execute();

            $stmt = null;
            $db->disconnect($con);
        }
    }
}
