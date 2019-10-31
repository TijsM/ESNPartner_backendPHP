<?php

require_once(__DIR__ . '/mappers/authenticationConnection.php');
require_once(__DIR__ . '/help-methods/sendErrorMessage.php');
require_once(__DIR__ . '/help-methods/generateToken.php');
    
$authCon = new AuthenticationConnection();

$email = $_POST['email'];
$password = $_POST['password'];


$resultFromDb = $authCon->getLoginCredentials($email);
$passwordFromDb = $resultFromDb['password'];
$studentId = $resultFromDb['studentId'];


$token = null;
$expirationDate = null;
$response = null;

if ($passwordFromDb == $password) {
    $token =  generteToken();

    $currentDateTime = new DateTime();
    $expirationDate = $currentDateTime->modify('+1 hour');

    $authCon->saveToken($email, $token, $expirationDate->format('Y-m-d H:i:s'));

    $response = new stdClass();
    $response->token = $token;
    $response->expirationDate = $expirationDate->format('Y-m-d H:i:s');
    $response->studentId = $studentId;
} else {
    $response = printErrorMessage('credentials are wrong', __LINE__);
}

echo json_encode($response, JSON_PRETTY_PRINT);

