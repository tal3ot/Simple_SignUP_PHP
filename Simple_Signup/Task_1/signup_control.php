<?php

declare(strict_types= 1); //it prevent more errors from happening inside our code like typoo or submitting wrong type of data. 

//Checking if any data is missing
function is_input_empty(string $username, string $pwd, string $email, string $phoneNum) { //string to prevent the boolen expression
    if (empty($username) || empty($pwd) || empty($email) || empty($phoneNum)) {
        return true;
    } else {
        return false;
    }       
}

//Checking if the username used before
function is_username_taken(object $pdo, string $username) {
    if (get_username($pdo, $username)) {
        return true;
    } else {
        return false;
    }       
}

//checking the validation of the e-mails
function is_email_invalid(string $email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
        return true;
    } else {
        return false;
    }       
}

//Checking if the e-mails used before
function is_email_registered(object $pdo, string $email) {
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }       
}

//Checking the validation of the phone number
function is_phone_wrong(string $phoneNum) {

    // Remove any non-digit characters
    $digitsOnly = preg_replace('/\D/', '', $phoneNum);
    // Check the length of the phone number
    if (strlen($digitsOnly) < 11) {
        return true;
    } else {
        return false;
    }       
}

//Checking if the phone number used before
function is_phone_registered(object $pdo, string $phoneNum) {
    if (get_phone($pdo, $phoneNum)) {
        return true;
    } else {
        return false;
    }       
}
