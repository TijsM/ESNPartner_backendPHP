<?php

require_once(__DIR__ . '/mappers/universityConnection.php');
require_once(__DIR__ . '/help-methods/tokenChecker.php');
require_once(__DIR__ . '/help-methods/sendErrorMessage.php');


if (checkToken()) {
    $uniCon = new UniversityConnection();
    $uniesJson = new stdClass();
    $resultsFromDb = $uniCon->getAllUniverisities();

    foreach ($resultsFromDb as $row) {
        $id = $row[0];
        $cityId = $row[1];
        $latitude = $row[2];
        $longtitude = $row[3];
        $name = $row[4];


        $uniesJson->$id = new stdClass();
        $uniesJson->$id->id = $id;
        $uniesJson->$id->cityId = $cityId;
        $uniesJson->$id->longtitude = $longtitude;
        $uniesJson->$id->latitude = $latitude;
        $uniesJson->$id->name = $name;
    }


    echo json_encode($uniesJson, JSON_PRETTY_PRINT);
} else {
    echo printErrorMessage('token is not valid', __LINE__);
}
