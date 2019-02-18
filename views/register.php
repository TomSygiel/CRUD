<?php

session_start();

//Database connection

include '../partials/db_connection.php';

//Defining all values collected from the form

$name = $_POST["name"];
$address = $_POST["address"];
$city = $_POST["city"];
$postcode = $_POST["postcode"];
$telephone = $_POST["telephone"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];

//Encrypting password

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

//If statement comes here to check if information is filled in or not

if (empty($name) || empty($address) || empty($city) || empty($postcode) || empty($telephone) || empty($email) || empty($username) || empty($password)) {

    header('Location: ../login_and_registration.php?error=empty');
    exit();
    
} if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    header('Location: ../login_and_registration.php?error=invalid');
    exit();
    
}

//Inserting the information into a designated database table

$statement = $pdo->prepare("INSERT INTO user_info (name, address, city, postcode, telephone, email, username, password) VALUES (:name, :address, :city, :postcode, :telephone, :email, :username, :password)");

//Executing the statement

$statement->execute(

    [
    ":name" => $name,
    ":address" => $address,
    ":city" => $city,
    ":postcode" => $postcode,
    ":telephone" => $telephone,
    ":email" => $email,
    ":username" => $username,
    ":password" => $hashed_password
    ]

);

//Re-directing to validate by loging in

header('Location: ../login_and_registration.php?notice=complete');

?>