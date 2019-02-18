<?php

session_start();

  include '../partials/db_connection.php';

  //Deleting unwanted item from selected_product table 
    
  $statement = $pdo->prepare ("DELETE FROM selected_product WHERE product_name = :product_name");

  $statement -> execute([":product_name" => $_GET["product_name"]]);

  header('Location: ../checkout.php');
    
?>