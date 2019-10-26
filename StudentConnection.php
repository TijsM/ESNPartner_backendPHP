<?php

require_once('Connection.php');

class StudentConnection
{
    function getAllStudents()
    {
        $db = new DB();                                             // creation new object of the class in connection.php

        $con = $db->connect();
        if ($con) {

            $studentsFromDatabase = array();                        // prepare an array that can hold the result

            $stmt = $con->prepare("SELECT * FROM student");         // prepare the select statement
            $stmt->execute();                                       // execute the select statement

            
            while ($row = $stmt->fetch()) {                         // loop through each row in the result from the database
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
                    ]
                );
            }

            $stmt = null;                                            // empty the statement object
            $db->disconnect($con);                                   // close connection

            return $studentsFromDatabase;                            // return the result for use where list_of_students() is called
        }
    }


    function getStudent($id){

        $db = new DB();
        $con = $db->connect();

        if($con){
            $stmt = $con->prepare("SELECT * FROM student WHERE studentId = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $result = $stmt->fetch();

            $stmt = null;
            $db->disconnect($con);

            return $result;
        }
    }
}
