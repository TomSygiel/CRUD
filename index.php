<?php

//Starting session 
session_start();

//Neccesary HTML elemnts including <head> and all meta and links information

require 'partials/head.php';

?>

<body>

    <?php
    
    //including header and navigation bar
    
    include 'partials/header.php';
        
    include 'partials/nav.php';

    ?>

    <!--Container fluid-->
    
    <main class="container-fluid">
        
        <div class="row">
        
            <div class="col text-center welcome_message">

                <?php
                
                //Welcome message, 'if statement' rotated throughout the week        
        
                echo "<br/>";
        
                if (date("l") == "Monday") {
                    echo "<p>Welcome Monday shoppers, enjoy 50% off today!</p>";
                }

                elseif (date("l") == "Wednesday") {
                    echo "<p>Welcome Wednesday's shoppers! <br/> Today all total sales include 10% extra in contribution to our Children's Hospital Toys Donation program!</p>";
                }

                elseif (date("l") == "Friday") {
                    echo "<p>Happy Friday! All sales for over 200 SEK receive 20 SEK discount!</p>";
                } else {
                    echo "<p>Welcome to your one stop dinosaur shop!</p>";
                }
                
                //Welcome message for logged in user
        
                if (isset($_SESSION["username"])){?>
        
                    <p>Hej <?= $_SESSION["username"];?>, you are now logged in!</p>
        
                <?php 
            
                } 
                
                ?>
        
            </div>
        
        </div>
        
       <form action="views/order_handling.php" method="POST" class="row">
           
            <div class="col-12">

                <div class="row justify-content-around product_window">

                    <!--Including product cards inside the form to collect the quantity input-->
                    
                    <?php 
                    
                    include 'partials/product_card.php'; 
            
                    ?>

                </div>
                
            </div>
            
        </form>

    </main>
    
    <!--closing container fluid-->
    
</body>

<?php

//Including footer

include 'partials/footer.php';

?>
