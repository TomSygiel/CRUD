<?php

session_start();

include '../partials/db_connection.php';

$username = $_POST["username"];
$password = $_POST["password"];

$statement = $pdo->prepare("SELECT * FROM user_info WHERE username= :username");

$statement->execute(

    [
    ":username" => $username
    ]

);

$fetched_user = $statement->fetch();

$is_password_correct = password_verify($password, $fetched_user["password"]);

if ($is_password_correct) {
    
    $_SESSION["username"] = $fetched_user["username"];
    
    header ('Location: ../index.php');
    
} else {
    
    header ('Location: ../login_and_registration.php?error=login_failed');
    
}

?>