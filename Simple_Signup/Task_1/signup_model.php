<?php

declare(strict_types= 1); //it prevent more errors from happening inside our code like typoo or submitting wrong type of data. 

//Create new users
function create_user(object $pdo, string $username, string $pwd, string $email, string $phoneNum) {

    $query = "INSERT INTO users_info (username, pwd, email, phoneNum) VALUES (:username, :pwd, :email, :phoneNum);";

    $stmnt = $pdo->prepare($query);

    // the time it take between every wrong pass the user write 12 is ok not slow or annoying
    $options = [
        "cost"=> 12
    ];
    // To hash the password and make it ununderstandable if any hacker try to steal it
    $hashedpwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    $stmnt->bindParam(":username", $username);
    $stmnt->bindParam(":pwd", $hashedpwd);
    $stmnt->bindParam(":email", $email);
    $stmnt->bindParam(":phoneNum", $phoneNum);
    $stmnt->execute();

    
    header("Location: ../Index_Task_01.php?signup=success");
    $pdo = null;
    $stmnt = null;

    die();
}

function get_username(object $pdo, string $username) { // it will to communicate with the db to know if the username is already taken
    
    $query = "SELECT username FROM users_info WHERE username = :username;";

    $stmnt = $pdo->prepare($query);
    $stmnt->bindParam(":username", $username);
    $stmnt -> execute();

    $result = $stmnt->fetch(PDO::FETCH_ASSOC); 

    return $result;
}

function get_email(object $pdo, string $email) { // it will to communicate with the db to know if the email is already taken
    
    $query = "SELECT email FROM users_info WHERE email = :email;";

    $stmnt = $pdo->prepare($query);
    $stmnt->bindParam(":email", $email);
    $stmnt -> execute();

    $result = $stmnt->fetch(PDO::FETCH_ASSOC); 

    return $result;
}

function get_phone(object $pdo, string $phoneNum) { // it will to communicate with the db to know if the phone is already taken
    
    $query = "SELECT phoneNum FROM users_info WHERE phoneNum = :phoneNum;";

    $stmnt = $pdo->prepare($query);
    $stmnt->bindParam(":phoneNum", $phoneNum);
    $stmnt -> execute();

    $result = $stmnt->fetch(PDO::FETCH_ASSOC); 

    return $result;
}


