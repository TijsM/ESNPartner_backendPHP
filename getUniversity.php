<?php

require_once('UniversityConnection.php');

$uniCon = new UniversityConnection();

$uniesJson = new stdClass();

$id = $_GET['id'];

$resultsFromDb = $uniCon->getUniversity($id);


$id =$resultsFromDb['universityId'];
$city = $resultsFromDb['city'];
$country = $resultsFromDb['country'];
$latitude = $resultsFromDb['latitude'];
$longtitude = $resultsFromDb['longtitude'];
$name = $resultsFromDb['name'];


$uniesJson->$id = new stdClass();
$uniesJson->$id->id = $id;
$uniesJson->$id->city = $city;
$uniesJson->$id->country = $country;
$uniesJson->$id->longtitude = $longtitude;
$uniesJson->$id->latitude = $latitude;
$uniesJson->$id->name = $name;

echo json_encode($uniesJson, JSON_PRETTY_PRINT);