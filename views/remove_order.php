<?php

session_start();

  include '../partials/db_connection.php';
    
  //Removing one unit from selected items

  $statement = $pdo->prepare ("UPDATE selected_product SET amount = amount -1 WHERE product_name = :product_name");

  $statement -> execute([":product_name" => $_GET["product_name"]]);

  header('Location: ../checkout.php');
    
?>