<?php

//Including array for all toys

include 'partials/array.php';

    
foreach($all_toys as $single_toy) { ?>

  <div class="col-12 col-md-4 col-lg-3 text-center card">
   
      <?php
    
        echo $single_toy["image"]; 
    
        echo "<h3><strong>" . $single_toy["product_name"] . "</strong></h3>";
    
        echo "<p>" . $single_toy["product_info"] . "</p>";

        echo "<p>" . $single_toy["price"] . " SEK</p>";
    
        echo "<label for='quantity'>Quantity </lable>";
    
        ?>
           
            <input class="qty_input" id="quantity" name="amount[]" type="number" value="0" min="0">
    
            <input class="bttn" type="submit" value="Add">
   
    </div>

<?php
   
}
    
?>
