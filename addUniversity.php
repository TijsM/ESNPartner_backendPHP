<?php

require_once('UniversityConnection.php');

$uniCon = new UniversityConnection();

$cityId = $_POST['cityId'];
$longtitude = $_POST['longtitude'];
$latitude = $_POST['latitude'];
$name = $_POST['cityName'];




$uniCredentials = array(
    'cityId'=>$cityId,
    'longtitude'=>$longtitude,
    'latitude'=>$latitude,
    'cityName'=>$name
);

$uniCon->addUniversity($uniCredentials);
