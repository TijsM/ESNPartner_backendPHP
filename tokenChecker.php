<?php

require_once('StudentConnection.php');

function checkToken($id, $token){
    $studentCon = new StudentConnection();
    $answerFromDb = $studentCon->checkToken($id, $token);
    $tokenFromDb = $answerFromDb['jwtToken'];
    $expirationTimeFromDb = $answerFromDb['expirationTime'];

    //convert from string to datetime
    $expirationTimeFromDb = new DateTime($expirationTimeFromDb);

    $tokenIsValid = false;
    $dateIsValid = false;

    $expirationAndTokenValid = false;


    if($expirationTimeFromDb > new DateTime()){
        $dateIsValid = true;
    }
    
    if($token == $tokenFromDb){
        $tokenIsValid = true;
    }

    if($tokenIsValid && $dateIsValid){
        $expirationAndTokenValid = true;
    }

    return $expirationAndTokenValid;

    

}

