<?php

ini_set("session.use_only_cookies",1);
ini_set("session.use_strict_mode",1);

// Set some Session Cookie parameters
session_set_cookie_params([
    "lifetime"=> 1800,
    "domain"=> "localhost",
    "path"=> "/",
    "secure"=> true,
    "httponly"=> true
]);

session_start();
 
// to regenerate the cookies every 30 min 
if (isset($_SESSION["last_regeneration"])) {

    regeneration_session_id(); 
} else {
    $interval = 60 * 30;

    if ( time() - $_SESSION["last_regeneration" >= $interval]) {
        regeneration_session_id();
    }
}


function regeneration_session_id() {
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] = time();
}