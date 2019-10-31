<?php

require_once(__DIR__ . '/mappers/countryConnection.php');
require_once(__DIR__ . '/help-methods/tokenChecker.php');
require_once(__DIR__ . '/help-methods/sendErrorMessage.php');

if(checkToken()){

    $countryCon = new CountryConnection();
    $countriesJson = new stdClass();
    $resultsFromDb = $countryCon->getAllCities();

    foreach($resultsFromDb as $row){
        $id = $row[0];
        $countryCode = $row[1];
        $countryName = $row[2];

        $countriesJson->$id = new stdClass();
        $countriesJson->$id->id = $id;
        $countriesJson->$id->countryCode = $countryCode;
        $countriesJson->$id->countryName = $countryName;
    }

    echo json_encode($countriesJson,JSON_PRETTY_PRINT);
}

else{
    echo printErrorMessage('token is not valid', __LINE__);
}