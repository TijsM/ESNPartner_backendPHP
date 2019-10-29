<?php
require_once(__DIR__ . '/mappers/universityConnection.php');
require_once(__DIR__ . '/help-methods/tokenChecker.php');
require_once(__DIR__ . '/help-methods/sendErrorMessage.php');

if (checkToken()) {

    $uniCon = new UniversityConnection();

    $cityId = $_POST['cityId'];
    $longtitude = $_POST['longtitude'];
    $latitude = $_POST['latitude'];
    $name = $_POST['cityName'];

    $uniCredentials = array(
        'cityId' => $cityId,
        'longtitude' => $longtitude,
        'latitude' => $latitude,
        'cityName' => $name
    );

    $uniCon->addUniversity($uniCredentials);
}
else{
    echo printErrorMessage('token is not valid', __LINE__);
}
