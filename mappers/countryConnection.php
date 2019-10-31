<?php

require_once(__DIR__.'/../help-methods/connection.php');


class CountryConnection{
    function getAllCities(){
        $db = new DB();

        $con = $db->connect();
        if($con){
            $countriesFromDb = array();

            $stmt = $con->prepare("SELECT * FROM country");         
            $stmt->execute();


            while ($row = $stmt->fetch()) {                       
                array_push(
                    $countriesFromDb,
                    [
                        $row['countryId'],
                        $row['countryCode'],
                        $row['countryName'],
                    ]
                );
            }

            $stmt = null;                                            
            $db->disconnect($con);                                  

            return $countriesFromDb;   
            
        }
    }
}