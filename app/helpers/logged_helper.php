<?php

function isLoggedIn()
{
    $auth = new Authenticate();
    if ($auth->validate_jwt()) {
        return true;
    } else {
        return false;
    }
}
