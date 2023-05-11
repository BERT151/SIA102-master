<?php
require 'cart/check_if_added.php';
require 'include/connection.php';  
require 'include/function.php';  
require 'include/header.php';
?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="css/productstore.css">

  </head>
  <body>
  <section class="product" id="product">
    <div class="gallery">
    <?php
       if(isset($_GET['brands']))
       {
         $id = $_GET['id'];
       $branchecked = [];
       $branchecked = $_GET['brands'];
       foreach($branchecked as $proditemsbrand)
       {  
       $products = "SELECT products.id, products.name, products.category_id,products.price,inventory.supply_id, products.photo, products.description, inventory.qty,inventory.stock_type
        FROM products
        INNER JOIN inventory ON products.id = inventory.supply_id where inventory.stock_type = '1' And CATEGORY_ID='$id'";
       $products_run = mysqli_query($con, $products);
       if(mysqli_num_rows($products_run) > 0)
       {
       foreach($products_run as $proditems) :
          $image_data = $proditems['photo'];
          $binary_data = base64_decode($image_data);
          $img_src = 'data:image/png;base64,' . base64_encode($binary_data);
      ?>
      <div class="col-md-4 mt-3">
        <div class="border p-2">
    <div class="box">
        <div class="image">
        <img src="<?php echo $img_src; ?>" alt="Images">
        <div class="icons">
    <?php if(!isset($_SESSION['user'])){  ?>
        <p><a href="../login.php" role="button" ><button> Buy Now</button></a></p>
    <?php
        }
        else{
        if(check_if_added_to_cart($proditems["supply_id"])){
        echo '<a class="cartdis" href="#" disabled>Added to cart</a>';
        }else{
        ?>
    <form method="post" action=cart/cart_add.php?id=<?php  echo $proditems["supply_id"]; ?>">
    <button>Add to cart</button>
    <input type="number" name="qty" id="qty" placeholder="1" min="1" class="input"/>
    <?php
        }
        }
        ?>
        </div>
        </div>
        <div class="content">
        <h3><?php echo $proditems["name"]; ?></h3>
    <br>
        <div class="price">₱ <?php echo $proditems["Price"];?> <input type="hidden" name="price" value="<?php echo $proditems["price"];?>"></input></div>
    </form>
        </div>
        </div>
        </div>
        </div>
        <?php
        endforeach;
        }
        }
        }
        else
        {
            $f = 0;
            $id = $_GET['id'];
        $products = "SELECT products.id, products.name, products.category_id,products.price,inventory.supply_id, products.photo, products.description, inventory.qty,inventory.stock_type
        FROM products
        INNER JOIN inventory ON products.id = inventory.supply_id where products.category_id='$id' Group By inventory.supply_id ORDER BY products.price ASC";
        $products_run = mysqli_query($con, $products);
        if(mysqli_num_rows($products_run) > 0)
        {
        foreach($products_run as $proditems) :
          $supply_id = $proditems['supply_id'];
          $outqty = mysqli_query($con, "SELECT SUM(qty) AS OUT_qty FROM inventory where inventory.stock_type = '2' and inventory.supply_id= '$supply_id' ");

          if(mysqli_num_rows($outqty) > 0){
          foreach( $outqty as $fetch_out) :
          $out = $fetch_out["OUT_qty"];

          $inqty = mysqli_query($con, "SELECT SUM(qty) AS IN_qty FROM inventory where inventory.stock_type = '1' and inventory.supply_id='$supply_id' ");
         
          if(mysqli_num_rows($inqty) > 0){
          foreach( $inqty as $fetch_in) :

          $image_data = $proditems['photo'];
          $binary_data = base64_decode($image_data);
          $img_src = 'data:image/png;base64,' . base64_encode($binary_data);

          $in = $fetch_in["IN_qty"];

 
          $available = $fetch_in["IN_qty"] - $fetch_out["OUT_qty"];

        ?>
        <div class="content">
        <a  href="itempage.php?id=<?php  echo $proditems["supply_id"]; ?>">
        <img src="<?php echo $img_src; ?>" alt="Images">
        </a>
        <form method="post" action=cart/cart_add.php?id=<?php  echo $proditems["supply_id"]; ?>>
        <h3><?php echo $proditems["name"]; ?></h3>
        <div class="price"><h6> ₱<?php echo $proditems["price"];?></h6> <input type="hidden" name="price" value="<?php echo $proditems["price"];?>"></input>
        </div>
        <?php if(!isset($_SESSION['user'])){  ?>
        <?php if( $f ==  $available){

        echo '<div class="cartdiss"> <a href="#" disabled>Out of Stock</a> </div>
              <div class="heart"> <a href="#" disabled  class="fa fa-heart"></a> </div>';
         }else{?>
        <div class="vbbuy">
        <p><a href="../login.php" role="button" class="buy">Buy Now</a></p> 
        </div>
        <?php }?>
        <?php
        }
        else{
        if(check_if_added_to_cart($proditems["supply_id"])){
        echo '<div class="cartdis"> <a href="#" disabled>Added to cart</a> </div>';
        }

        elseif( $f ==   $proditems['qty']){
        echo '<div class="cartdiss"> <a href="#" disabled>Out of Stock</a> </div>
              <div class="heart"> <a href="#" disabled  class="fa fa-heart"></a> </div>';
         }
        else{
        ?>
    <div class="buttongrp">
    <div class="eq">
    <input type="number" name="qty" id="qty" placeholder="1" min="1" max="<?php echo $available; ?>" class="textbox"/>
    </div>
    <div>
    <a class="btn" href="../cart/buy_add.php?id=<?php  echo $proditems["supply_id"]; ?>">Buy</a>
    </div>
    <div>
    <button class="btn2">Add to cart</button>
    </div>
    </div>

    <?php
        }
        }
        ?>
    </form>
    </div>
    <?php
    endforeach;
    }
    endforeach;
    }
    endforeach;
    }
    else
    {
    echo "No Items Found";
    }
    }
    ?>
    </div>  
  </section>
    <?php require 'include/footer.php'; ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/main.js"></script>

  </body>
</html>

