<?php

session_start();

require 'partials/head.php';

?>

<body>

    <?php
    
    include 'partials/header.php';

    include 'partials/nav.php';

    ?>

    <div class="row justify-content-around">

        <div class="col-12 col-md-6 text-center card">

            <h2>Delivery Address:</h2>
            
                 <?php
            
                    include 'partials/db_connection.php';
            
                    $statement = $pdo->prepare("SELECT name, address, city, postcode, telephone, email FROM user_info WHERE username = :username");
            
                    //Kepping user aware of their login session still running
            
                    if (isset($_SESSION["username"])) { ?>

                        <h5>Hej <?= $_SESSION["username"];?>, please review your delivery details and your order!</h5>

                        <br/>

                    <?php

                        $statement->execute(
                        [
                        ":username" => $_SESSION["username"]
                        ]

                        );

                        $user_info = $statement->fetchAll(PDO::FETCH_ASSOC);

                        //var_dump($user_info);

                        foreach ($user_info as $user) { ?>

                           <p><?= $user["name"]; ?></p>
                           <p><?= $user["address"]; ?></p>
                           <p><?= $user["city"]; ?></p>
                           <p><?= $user["postcode"]; ?></p>
                           <p><?= $user["telephone"]; ?></p>
                           <p><?= $user["email"]; ?></p>
                    
                    <?php 
                
                    }
                
                    } else {

                        echo " Currently you are not logged in! ";
                    }

                    ?>
                    
            <br/>
            
        </div>


        <div class="col-12 col-md-6 justify-content-center text-center card order_card">

            <h2>Your Order Summary:</h2>

                <?php
            
                //Outputting information from selected_product table in database in an array
            
                $statement = $pdo->prepare("SELECT * FROM selected_product JOIN user_info WHERE selected_product.username = user_info.username");
            
                $statement->execute();
            
                $selected_product = $statement->fetchAll(PDO::FETCH_ASSOC);
            
                //Variable dump for debugging
            
                //var_dump($selected_product);
            
                $sum = 0;
            
                //Product checkout 
            
                foreach ($selected_product as $product) {
                     
                    echo $product["product_name"]. " figurine: ";
                    echo $product["amount"] . " unit/s at ";
                        
                        if (date("l") == "Friday" && $product["price"] > 200) {
                            
                            $total_price = ($product["price"] * $product["amount"]) - 20;
                            echo " (Price includes 20 SEK discount!) ";
                            
                        } else {
                            
                            $total_price = $product["price"] * $product["amount"];
                        }
                            echo $total_price . " SEK!</p>"; ?>
                            
                            <div>
                            
                                <a href="views/add_to_order.php?product_name=<?= $product["product_name"];?>"><i class="fa fa-plus-square" style="font-size:24px;color: gray"></i></a> 

                                <a href="views/remove_order.php?product_name=<?= $product["product_name"];?>"><i class="fa fa-minus-square" style="font-size:24px;color: gray"></i></a> 

                                <a href="views/cancel.php?product_name=<?= $product["product_name"];?>"><i class="fa fa-trash" style="font-size:24px;color:gray"></i></a>
                            
                            </div>
                            
                        <?php

                        $sum += ((int)$product["price"] * (int)$product["amount"]);
                        
                        echo "<br/>"; 
                    
                } //Product checkout end
            
                echo "<br/>";
            
                    if (date("l") == "Monday") {
                        $sum = ($sum * 0.5);
                        echo "<h5><strong>Monday's 50% discount: " . $sum . " SEK!</strong></h5><br/>";
                        echo "<h4>Happy Monday!</h4><br/>";
                
                    } elseif (date("l") == "Wednesday") {
                        $sum = ($sum * 1.1);
                        echo "<h5><strong>Your total includes 10% more: " . $sum . " SEK!</strong></h5><br/>";
                        echo "<h4>Thank you for supporting our Children's Hospital Toys Donation program!<h4><br/>";

                    } else {
                        echo "<h5><strong>Your Total is: " . $sum . " SEK</strong><h5>";
                    }
            
                echo "<br/>";
            
                ?>
            
            <h5>Complete your order here <button class="Log_out"><a href="logout.php">Order!</a></button></h5>

        </div>

    </div>

</body>

<?php

include 'partials/footer.php';

?>
