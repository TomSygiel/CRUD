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
            
                //Defining all all of the $_SESSION variables

                $_SESSION["name"] = $_POST["name"];
                $_SESSION["address"] = $_POST["address"];
                $_SESSION["city"] = $_POST["city"];
                $_SESSION["postcode"] = $_POST["postcode"];
                $_SESSION["telephone"] = $_POST["telephone"];
                $_SESSION["email"] = $_POST["email"];
                
                    
                //Form details collection and error handling
                //If empty, error message prompts to complete the form with missing information
            
                if (empty($_SESSION["name"])) {
                    echo "* Full name required!";
                } else {
                    echo $_SESSION["name"];
                }
                
                echo "<br/>";

                if (empty($_SESSION["address"])) {
                    echo "*Address required!";
                } else {
                    echo $_SESSION["address"];    
                } 

                echo "<br/>";

                if (empty($_SESSION["city"])) {
                    echo "*City required!";
                } else {
                    echo $_SESSION["city"]; 
                } 

                echo "<br/>";

                if (empty($_SESSION["postcode"])) {
                    echo "* Postcode required!";
                } else {
                    echo $_SESSION["postcode"]; 
                } 

                echo "<br/>";

                if (empty($_SESSION["telephone"])) {
                    echo "* Telephone number required!";
                } else {
                    echo $_SESSION["telephone"]; 
                } 

                echo "<br/>";

                if (empty($_SESSION["email"])) {
                    echo "* E-mail required!";
                } else {
                    echo "Order confirmation will be sent to: " . $_SESSION["email"]; 
                } 

                echo "<br/>";

                echo "<h4><strong>Thank you for your order!</strong></h4>";

                echo "<br/>";

                ?>

        </div>


        <div class="col-12 col-md-6 justify-content-center text-center card order_card">

            <h2>Your Order Summary:</h2>

                <?php
            
                include 'partials/array.php';
            
                //Variable dump for debugging
            
                //var_dump($_POST);
            
                $sum = 0;
            
                //Product checkout 
            
                foreach($all_toys as $index => $single_toy) {
            
                    if(!empty($_POST["amount"][$index]) && isset($_POST["amount"][$index]) > 0) {

                        echo $single_toy["product_name"]. " figurine: ";
                        echo $_POST["amount"][$index] . " unit/s at ";
                        
                        if (date("l") == "Friday" && $single_toy["price"] > 200) {
                            $total_price = ($single_toy["price"] * $_POST["amount"][$index]) - 20;
                            echo "Price includes 20 SEK discount!";
                            
                        } else {
                            $total_price = $single_toy["price"] * $_POST["amount"][$index];
                        }
                            echo $total_price . " SEK!</p>";

                        $sum += ((int)$single_toy["price"] * (int)$_POST["amount"][$index]);
                        
                        echo "<br/>";
                        
                    }//Product checkout end

                }
            
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
            
            <h5>Complete your order by login out <button class="Log_out"><a href="logout.php">Log out!</a></button></h5>

        </div>

    </div>

</body>

<?php

include 'partials/footer.php';

?>
