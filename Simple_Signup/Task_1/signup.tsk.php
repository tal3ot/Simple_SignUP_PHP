<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Grabbing the data from the DB
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];
    $phoneNum = $_POST["phoneNum"];

    try {
        //Including the required files
        require_once "dbh.tsk.php";
        require_once "signup_model.tsk.php";
        require_once "signup_control.tsk.php";


        //Errors handler
         $errors = [];

        if (is_input_empty($username, $pwd, $email, $phoneNum)) { // If any missing data
            $errors["input_empty"] = "Missing data!";
        }
        if (is_username_taken($pdo, $username)) { // If the username is signuped before
            $errors["username_taken"] = "Your username is taken before!";
        }
        if (is_email_invalid($email)) { //if the email is incorrect
            $errors["email_invalid"] = "Your email is incorrect!";
        }
        if (is_email_registered($pdo, $email)) { //If the email is signuped before
            $errors["email_registered"] = "Your email already registered!";
        }
        if (is_phone_wrong($phoneNum)) { //If the phone is wrong 
            $errors["phone_wrong"] = "Your phone number is wrong (Must be 11 digit) ";
        }
        if (is_phone_registered($pdo, $phoneNum)) { //If the phone is signuped before
            $errors["phone_registered"] = "Your phone number already registered!";
        }

        //Start a session
        require_once 'config_session.tsk.php';

        // To retype what he submitted when it's wrong
        if ($errors) {
            $_SESSION['errors_signup'] = $errors;
    
            $signupData = [
                'username'=> $username,
                'email' => $email,
                'phoneNum' => $phoneNum
            ];
            $_SESSION['signup_data'] = $signupData; 
    
            header("Location: ../Index_Task_01.php");

            die();  
            }
    
        // as long as no errors occurred, we'll start creating the new users
        create_user($pdo, $username, $pwd, $email, $phoneNum);

        header("Location: ../Index_Task_01.php");

        $pdo = null;
        $stmnt = null;

        die();

        } catch (PDOException $e) {

            die("Query Failed" . $e->getMessage());
        }

        } else {

        header("Location: ../Index_Task_01.php");
        }