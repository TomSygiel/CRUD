<?php

//Starting session 
session_start();

//Neccesary HTML elemnts including <head> and all meta nd links information

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


                ?>
        
            </div>
        
        </div>
        
        <form action="checkout.php" method="POST" class="row">
           
            <div class="col-12">

                <div class="row justify-content-around product_window">

                    <!--Including product cards inside the form to collect the qunatity input-->
                    <?php 
                    
                    include 'partials/product_card.php'; 
            
                    ?>

                </div>

                <div class="row justify-content-center form_card">
                    
                    <!--Offset used to locate the form card in the center-->

                    <div class="card col-12 col-md-6 offset-lg-4 col-lg-4">
                        
                        <label for="name"></label>
                        <input id="name" name="name" type="text" placeholder="First Name Second Name">
                        <br />

                        <label for="address"></label>
                        <input id="address" name="address" type="text" placeholder="Street Address">
                        <br />

                        <label for="city"></label>
                        <input id="city" name="city" type="text" placeholder="City">
                        <br />

                        <label for="postcode"></label>
                        <input id="postcode" name="postcode" type="text" placeholder="Postcode">
                        <br />

                        <label for="telephone"></label>
                        <input id="telephone" name="telephone" type="tel" placeholder="Telephone">
                        <br />

                        <label for="email"></label>
                        <input id="email" name="email" type="text" placeholder="E-mail: username@mail.com">
                        <br />

                        <input type="submit" value="Submit">
                        <br />

                    </div>

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
