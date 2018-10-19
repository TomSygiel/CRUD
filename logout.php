<?php

session_start();

//Including head.php to create uniform design of all pages

require 'partials/head.php';

?>

<?php
    
    include 'partials/header.php';

    //Navigation could be excluded but it helps to keep more uniform design of each page 
        
    include 'partials/nav.php';

?>
    
    <body>
      
        <?php
        
        //Log out mesage
        
        include 'partials/logout_message.php';
        
        ?>
        
    </body>
    
<?php

//Ending session and removing all information stored

session_destroy();

?>

<?php

include 'partials/footer.php';

?>
