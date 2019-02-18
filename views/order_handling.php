<?php

session_start();

  include '../partials/db_connection.php';

 //First, checking if the product is already in the database ("customer's basket") to update the quantity

  $statement = $pdo->prepare("SELECT product_name FROM selected_product JOIN user_info WHERE selected_product.username = user_info.username");
            
  $statement->execute();
            
  $selected_product = $statement->fetchAll(PDO::FETCH_ASSOC);
      
  foreach ($selected_product as $index => $product) {
         
        $search_array = array("find" => "product_name");
        $product_name = $product["product_name"];
        $amount = ($_POST["amount"][$index]);
        
        if (array_key_exists("find", $search_array)) {
              
            $statement = $pdo->prepare ("UPDATE selected_product SET amount = amount + " . $amount . " WHERE product_name = :selection_id");
          
            $statement -> execute([":selection_id" => $product_name]);
              
        }
          
  }

  //Debugging

  //var_dump($_POST);

  //Including array with all dinosaur toys

  include '../partials/array.php';

  $statement = $pdo->prepare("INSERT INTO selected_product (product_name, price, amount, username) VALUES (:product_name, :price, :amount, :username)");

  //Foreach loop collecting information from array to identify the values needed for the database 

  foreach ($all_toys as $index => $single_toy) {
      
      //Defining variables first collected from aray or via $_POST
      
      $product_name = $single_toy["product_name"];
      $price = $single_toy["price"];
      $amount = $_POST["amount"][$index];
      $username = $_SESSION["username"];
      
      $check_statement = $pdo->prepare("SELECT * FROM selected_product WHERE product_name = :product_name");
            
      $check_statement->execute([":product_name" => $product_name]);
      
      $product_exists = $check_statement->fetch(PDO::FETCH_ASSOC);
      
      if(!$product_exists && !empty($_POST["amount"][$index]) && isset($_POST["amount"][$index]) > 0){
          
          $statement->execute(
                [
                ":product_name" => $product_name,
                ":price" => $price,
                ":amount" => $amount,
                ":username" => $username,
                ]
            );
      }
          
   }

header('Location: ../index.php');

?>


