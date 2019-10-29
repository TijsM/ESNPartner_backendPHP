<?php

require_once('StudentConnection.php');

$studentCon = new StudentConnection();

$email = $_POST['email'];
$password = $_POST['password'];


$resultFromDb = $studentCon->getLoginCredentials($email);
$passwordFromDb = $resultFromDb['password'];
$studentId = $resultFromDb['studentId'];


$token = null;
$expirationDate = null;
$response = null;

if ($passwordFromDb == $password) {
    $token =  generteToken();
    
    $currentDateTime = new DateTime();
    $expirationDate = $currentDateTime->modify('1 hour');

   $studentCon->saveToken ($email, $token, $expirationDate->format('Y-m-d H:i:s'));

   $response = new stdClass();
   $response->token = $token;
   $response->expirationDate = $expirationDate->format('Y-m-d H:i:s');
   $response->studentId = $studentId;
    

} else {
    $response = sendErrorMessage('credentials are wrong', __LINE__);
}

echo json_encode($response, JSON_PRETTY_PRINT);







function generteToken()
{
    $token = bin2hex(random_bytes(65));
    return $token;
}


function sendErrorMessage($sMessage,  $iLine)
{

    $error = new stdClass();
    $error->status = 0;
    $error->message = $sMessage;
    $error->line = $iLine;

    return $error;

    exit;
}
