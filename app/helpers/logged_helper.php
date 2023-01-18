<?php
require_once "../app/generate_jwt.php";
require_once 'vendor/autoload.php';

function isLoggedIn()
{
    $auth = new Authenticate();
    if ($auth->validate_jwt()) {
        return true;
    } else {
        return false;
    }
}
