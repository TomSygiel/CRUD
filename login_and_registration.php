<?php

session_start();

require 'partials/head.php';

?>

<body>

    <?php
    
    include 'partials/header.php';

    include 'partials/nav.php';

    ?>
    
    <main class="container-fluid text-center">
    
        <?php
        
        if (isset($_SESSION["username"])){?>
        
            <p>Hej <strong><?= $_SESSION["username"]; ?></strong>!<br/> 
            * Not <strong><?= $_SESSION["username"]; ?></strong>? Please log in or register!</p>
        
        <?php } else { ?>
                <h3>Please log in!</h3>
                <h3>New users, complete registration first and log in to confirm login details!</h3>
        <?php }
        
        //Error handling, checking for empty fields and validating e-mail format
        
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        
        if (strpos($fullUrl, "error=empty") == true) {
            echo "<p class='error'>* All fields are required!</p>";
            header ('refresh:5;url=login_and_registration.php');
            exit();
        }
        
        elseif (strpos($fullUrl, "error=invalid") == true) {
            echo "<p class='error'>* Enter valid e-mail address!</p>";
            header ('refresh:5;url=login_and_registration.php');
            exit();
        }
        
        elseif (strpos($fullUrl, "error=login_failed") == true) {
            echo "<p class='error'>* Login failed, please try! If new user, please register!</p>";
            header ('refresh:5;url=login_and_registration.php');
            exit();
        }
        
        elseif (strpos($fullUrl, "notice=complete") == true) {
            echo "<p class='notice'>* Registration complete! Please log in to confirm your login details!</p>";
            header ('refresh:5;url=login_and_registration.php');
            exit();
        }
        
        ?>
     
            <form action="views/register.php" method="POST" class="row text-center justify-content-center">
           
               <div class="card col-12 col-md-6 offset-lg-4 col-lg-4">
               
                   <h2>Register</h2>
            
                        <label for="name"></label>
                        <input id="register_name" name="name" type="text" placeholder="First Name Second Name">
                        <br />

                        <label for="address"></label>
                        <input id="register_address" name="address" type="text" placeholder="Street Address">
                        <br />

                        <label for="city"></label>
                        <input id="register_city" name="city" type="text" placeholder="City">
                        <br />

                        <label for="postcode"></label>
                        <input id="register_postcode" name="postcode" type="text" placeholder="Postcode">
                        <br />

                        <label for="telephone"></label>
                        <input id="register_telephone" name="telephone" type="tel" placeholder="Telephone">
                        <br />

                        <label for="email"></label>
                        <input id="register_email" name="email" type="email" placeholder="E-mail: username@mail.com">
                        <br />

                        <lable for="register_username"></lable>
                        <input id="register_username" type="text" name="username" placeholder="Username">
                        <br/>

                        <label for="register_pasword"></label>
                        <input id="register_pasword" type="password" name="password" placeholder="Password">
                        <br/>

                        <input type="submit" name="Register" value="Register">
            
                </div>
            
            </form>

            <form action="views/login.php" method="POST" class="row text-center justify-content-center">
           
                <div class="card col-12 col-md-6 offset-lg-4 col-lg-4">
                
                    <h2>Login</h2>
           
                        <label for="login_username"></label>
                        <input id="login_username" type="text" name="username" placeholder="Username">
                        <br/>
                        
                        <label for="login_password"></label>
                        <input id="login_password" type="password" name="password" placeholder="Password">
                        <br/>
                        
                        <input type="submit" name="Login" value="Log in">
            
                </div>
            
            </form>
        
        </main>

</body>

<?php

include 'partials/footer.php';

?>
