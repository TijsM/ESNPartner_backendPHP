<?php


function returnErrorMessage($sMessage,  $iLine)
{
    $error = new stdClass();
    $error->status = 0;
    $error->message = $sMessage;
    $error->line = $iLine;

    return $error;

    exit;
}

function printErrorMessage($sMessage,  $iLine)
{
    echo '{
        "status": 0,
        "message": "' . $sMessage . '",
        "line": ' . $iLine . '
    }';

    exit;
}