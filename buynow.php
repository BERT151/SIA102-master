
<?php 
   require 'include/function.php';  
      require "include/mail.php";
     if (!isLoggedIn()) {
     $_SESSION['msg'] = "You must log in first";
     header('location:../login.php');
     exit;
     }
?>
<?php
    require 'cart/check_if_added.php';
    require 'include/header.php';
    
      $user_id = mysqli_real_escape_string($con, $_SESSION['user']['Account_ID']);
      $userdetail = mysqli_query($con, "SELECT * FROM account WHERE Account_ID = {$user_id}");
      $urow = mysqli_fetch_assoc($userdetail);


    $Account_ID=$_SESSION['id'];
    $user_products_query= "select products.id,products.name,products.price,inventory.qty,inventory.supply_id from buy inner join products on products.id=buy.Item_ID INNER JOIN inventory ON buy.Item_ID = inventory.supply_id where buy.Account_ID='$user_id'";


    $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
    $no_of_user_products= mysqli_num_rows($user_products_result);

    $sum=0;
    $total=0;
    $vat=0;
    if($no_of_user_products == 0){ 
    
    }else{
    while($row=mysqli_fetch_array($user_products_result) ){
            $quantity=$row['qty'];
            $sum= $quantity*$row['price'];
            $total += $sum;   
            $vat =   ($total/ 100) * 12;
    }
    }
    $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
    $no_of_user_products= mysqli_num_rows($user_products_result);
    $counter=0;
    while($row=mysqli_fetch_array($user_products_result))                   
    $counter = ltrim($counter, "0");


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/billing.css">
   <link rel="stylesheet" href="css/checkout.css">
</head>
<body>
  <div class="checkout">
    <div class="container">
        <div class="left-container">
	      <div style="overflow-x:auto; height: 220px; ">
            <table >
               <thead style="position: sticky; top: 0; padding: 30px;">
                <tr>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Price</th>
				          <th>Total</th>
                </tr>
						  </thead>
		  <?php
			$query = "SELECT  Username,Street,Barangay,City,Zip_Code FROM account WHERE Username='$username'";
			$results = mysqli_query($con, $query);
		
			if(!isset($_SESSION['user'])){
				header('location: login.php');
			}
			 $user_id=$_SESSION['id'];
			 $select_cart = mysqli_query($con, "select products.id,products.name,products.price,buy.qty,inventory.supply_id, inventory.stock_type from buy inner join products on products.id=buy.Item_ID INNER JOIN inventory ON buy.Item_ID = inventory.supply_id where buy.Account_ID='$user_id' And inventory.stock_type= '1' limit 1");
			  $total = 0;
			  $grand_total = 0;
			     $vat =0;
			 if(mysqli_num_rows($select_cart) > 0){
				while($fetch_cart = mysqli_fetch_assoc($select_cart)){
				   { 
					foreach( $select_cart as $fetch_cart) :	
				  $quantity=$fetch_cart['qty'];
				$total = $fetch_cart['price'] * $quantity;
				$grand_total += $total;
        $vat =   ($grand_total/ 100) * 12;        
		  ?> <tbody>
                <tr>
                  <td style="display:none;" ><?= $fetch_cart['supply_id']; ?></td>
                  <td><?= $fetch_cart['name']; ?></td>
                  <td><?= $fetch_cart['qty']; ?></td>
                  <td><?= number_format((float)  $fetch_cart['price'], 2, '.', ','); ?></td>
				  <td><?= number_format((float)  $fetch_cart['qty'] * $fetch_cart['price'], 2, '.', ','); ?></td>
                </tr>
              </tbody>
		<?php	
		endforeach;
		}?>				
              </table>
              </div>
			        <div class="price">
              <p><b style="margin-right:100px; color: #18A6E3;">Sub Total: </b><span style=" float:right;"><?php echo number_format((float) $grand_total, 2 , '.', ',');?></span></p>
              <p><b style=" color: #18A6E3;">VAT fee: </b><span style=" float:right;"><?php echo number_format((float)  $vat, 2, '.', ',');?></span></p>
              <p><b style=" color: #18A6E3;">Shipping fee: </b><span style=" float:right;">50</span></p>
              <hr>
              <p><b style="color: #18A6E3;">Total: </b><span style=" float:right;"><?php echo number_format((float) $grand_total + $vat + '50', 2, '.', ',');?></span></p>
              </div>
		<?php

			 }
		  }else{
			 echo "<div class='display-order'><span>your cart is empty!</span></div>
              <script>
      alert('Order Now');
      window.location.href='productstore.php';
      </script>";
		  }
		  ?>
                         
        </div>
        
        <div class="right-container">
			 <form action="" method="post">
          <br>
		  
            <h1 style="text-align: center; color: #18A6E3;">Cash on Delivery</h1>
            <div class="pinfo">
		        <p><b>Customer Name:</b> <?php echo $urow["Lname"]?> , <?php echo $urow["Fname"]?></p>
            <p><b>Shipping address:</b> <?php echo $urow["Street"]?> St, Brgy. <?php echo $urow["Barangay"]?>
						, <?php echo $urow["City"]?>, <?php echo $urow["Zip_Code"]?></p>
            <p><b>Contact Number:</b> <?php echo $urow["Contact_Num"]?></p>
		       	<p><b>Email Address:</b> <?php echo $urow["Email_Add"]?></p>
            </div>
            <br>
				<input type="hidden"  value="<?php echo $_SESSION['user']['Username']; ?>" name="uname">
				<input type="hidden" value="<?php echo $urow["Contact_Num"]?>" name="number">
				<input type="hidden" value="<?php echo $urow["Email_Add"]?>" name="email">
				<input type="hidden" value="<?php echo $urow["Street"]?>" name="street">
				<input type="hidden" value="<?php echo $urow["Barangay"]?>" name="barangay">
				<input type="hidden" value="<?php echo $urow["City"]?>" name="city">
				<input type="hidden" value="<?php echo $urow["Zip_Code"]?>" name="zip_code">
            <?php 
               $userquery="select Street,Barangay,City,Zip_Code,Contact_Num,Email_Add  from account where Account_ID='$Account_ID'";
               $userresult=mysqli_query($con,$userquery) or die(mysqli_error($con));
               $noproducts= mysqli_num_rows($userresult);

            $f = "needtocomplete";

            if( $f ==  $urow['Street']){ ?>
            <div class="buttongroup">
            <a href="register.php?id=<?php echo $Account_ID?>" class="btn">Add Address</a>
            <div class="Cbtn">
            <a class="button" href="cart/buy_remove.php"> Cancel</a>
            </div>
            </div>
            <?php }else{ 
               ?>
            <div class="buttongroup">
            <a href="buynow_checkout.php?id=<?php echo $Account_ID?>" class="btn">Order Now</a>
            <div class="Cbtn">
            <a class="button" href="cart/buy_remove.php"> Cancel</a>
            </div>
            </div>
            <?php }?>
      </form>
      </div>
	
      </div>
    </div>
<?php 
require 'include/footer.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="js/script.js"></script>
</body>
</html>