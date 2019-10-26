<?php

require_once('UniversityConnection.php');

$uniCon = new UniversityConnection();

$uniesJson = new stdClass();

$resultsFromDb = $uniCon->getAllUniverisities();

foreach($resultsFromDb as $row){
    $id = $row[0];
    $cityId = $row[1];
    $country = $row[2];
    $latitude = $row[3];
    $longtitude = $row[4];
    $name = $row[5];
    
    
    $uniesJson->$id = new stdClass();
    $uniesJson->$id->id = $id;
    $uniesJson->$id->cityId = $cityId;
    $uniesJson->$id->country = $country;
    $uniesJson->$id->longtitude = $longtitude;
    $uniesJson->$id->latitude = $latitude;
    $uniesJson->$id->name = $name;

}


echo json_encode($uniesJson, JSON_PRETTY_PRINT);