<?php

require_once('Connection.php');



class UniversityConnection
{
    function getAllUniverisities()
    {
        $db = new DB();

        $con = $db->connect();

        if ($con) {
            $universitiesFromDatabase = array();

            $stmnt = $con->prepare("SELECT * FROM university");
            $stmnt->execute();


            while ($row = $stmnt->fetch()) {
                array_push(
                    $universitiesFromDatabase,
                    [
                        $row['universityId'],
                        $row['cityId'],
                        $row['latitude'],
                        $row['longtitude'],
                        $row['name']
                    ]
                );
            }
        }

        $stmnt = null;
        $db->disconnect($con);

        return $universitiesFromDatabase;
    }

    function getUniversity($id)
    {
        $db = new DB();
        $con = $db->connect();

        if ($con) {
            $stmnt = $con->prepare("SELECT * FROM university WHERE universityId = :id");
            $stmnt->bindParam(':id', $id);

            $stmnt->execute();


            $result = $stmnt->fetch();

            $stmnt = null;

            $db->disconnect($con);

            return $result;
        }
    }

    function addUniversity($universityCredentials)
    {
        $db = new DB();
        $con = $db->connect();

        echo $universityCredentials['cityId'];  
        echo $universityCredentials['longtitude'];  
        echo $universityCredentials['latitude'];  
        echo $universityCredentials['cityName'];  

        if ($con) {
            $stmnt = $con->prepare("INSERT INTO `university`(`universityId`, `cityId`, `longtitude`, `latitude`, `name`) VALUES (null,:cityId,:longtitude, :latitude, :cityName)");
            $stmnt->bindParam(':cityId', $universityCredentials['cityId']);
            $stmnt->bindParam(':longtitude', $universityCredentials['longtitude']);
            $stmnt->bindParam(':latitude', $universityCredentials['latitude']);
            $stmnt->bindParam(':cityName', $universityCredentials['cityName']);

            $stmnt->execute();


            $stmnt = null;
            $db->disconnect($con);
        }
    }
}
