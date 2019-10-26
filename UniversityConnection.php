<?php

require_once('Connection.php');



class UniversityConnection{
    function getAllUniverisities(){
        $db = new DB();

        $con = $db->connect();

        if($con){
            $universitiesFromDatabase = array();

            $stmnt = $con->prepare("SELECT * FROM university");
            $stmnt->execute();


            while ($row = $stmnt->fetch()){
                array_push($universitiesFromDatabase, 
                [
                    $row['univirsityId'],
                    $row['city'],
                    $row['country'],
                    $row['latitude'],
                    $row['longtitude'],
                    $row['name']

                ]);
            }
        }

        $stmnt = null;
        $db->disconnect($con);

        return $universitiesFromDatabase;
    }

    function getUniversity($id){
        $db = new DB();
        $con = $db->connect();
         
        if($con){
            $stmnt = $con->prepare("SELECT * FROM university WHERE universityId = :id");
            $stmnt->bindParam(':id', $id);

            $stmnt->execute();


            $result = $stmnt->fetch();

            $stmnt = null;

            $db->disconnect($con);

            return $result;
        }
    }
}