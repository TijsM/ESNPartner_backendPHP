<?php

function generteToken()
{
    $token = bin2hex(random_bytes(65));
    return $token;
}
