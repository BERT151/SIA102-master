 
<?php 
   require 'include/function.php';  
   require "include/mail.php";
     if (!isLoggedIn()) {
     $_SESSION['msg'] = "You must log in first";
     header('location: login.php');
     exit;
     }
?>
<?php
require 'include/connection.php';
require 'include/header.php';
global $Product_ID;

          $user_id = mysqli_real_escape_string($con, $_SESSION['user']['Account_ID']);
          $userdetail = mysqli_query($con, "SELECT * FROM account WHERE Account_ID = {$user_id}");
          if(mysqli_num_rows($userdetail) > 0){
            $urow = mysqli_fetch_assoc($userdetail);
          }else{
            header("location:login.php");
          }



if(isset($_POST['order_btn'])){

  $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
    return $random_string;
    }
    // Output: iNCHNGzByPjhApvn7XBD 
    $PID = generate_string($permitted_chars, 9);


   $account = $_SESSION['id'];
   $uname =  $_POST['uname'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = "Cash on Delivery";
   $street = $_POST['street'];
   $city = $_POST['city'];
   $barangay = $_POST['barangay'];
   $zip_code = $_POST['zip_code'];

	     $address =  $street. ' ' . $barangay. ' ' . $city. ' ' . $zip_code;
         $two = '2';
		 $user_id=$_SESSION['id'];
         $cart_query = mysqli_query($con, "SELECT DISTINCT * FROM cart INNER JOIN products ON cart.Item_ID = products.id INNER JOIN inventory ON cart.Item_ID = inventory.supply_id where cart.Account_ID='$user_id' Group By inventory.supply_id");
         $total = 0;
		 $test = 0;
         $qty = 0;
		 $total_price = 0;
		 $price_total = 0;

			   if(mysqli_num_rows($cart_query) > 0){
			   while($product_item = mysqli_fetch_assoc($cart_query)){
				 $price = $product_item['price'];
				 $product_name[] = $product_item['name'];
				 $product_price = $product_item['price'] * $product_item['Qty'];
				 $price_total += $product_price;
				 $qty = $product_item['Qty'];
				 $test = $product_item['supply_id'];
				 $grand_total = $total += $total_price;

 

       $total_product = implode(',',$product_name);
       $detail_query = mysqli_query($con, "INSERT INTO `transaction` (`Product_ID`,`Account_ID`,`Order_ID`,`Name`, `Date`, `Payment_Method`,`Status`,`Total`,`Qty`,`Price`,`Street`,`Barangay`,`City`,`Zip_Code`)

      VALUES ( '$test','$account', '$PID','$uname',CURRENT_DATE,'$method','To Pack','$price_total','$qty','$price','$street','$barangay','$city','$zip_code')") or die('query failed');

 

      // $update_query="insert  inventory SET qty = qty -$qty WHERE supply_id = '$test'";
      // $update_query_result=mysqli_query($con,$update_query) or die(mysqli_error($con));

      $update_query="INSERT INTO inventory (supply_id, customer_id, amount, qty, stock_type,date_created)
      VALUES ($test, $account,  $price, $qty, $two, CURRENT_DATE )";
      $update_query_result=mysqli_query($con,$update_query) or die(mysqli_error($con));         

      require 'include/connection.php';
      $user_id=$_SESSION['id'];
      $zero = 0;
      $delete_query="delete P from cart P LEFT JOIN inventory I ON P.Item_ID = I.supply_id WHERE I.qty = '$zero' Or Account_ID = '$user_id' ";
      $delete_query_result=mysqli_query($con,$delete_query) or die(mysqli_error($con));


   
			  };
      $email = $_SESSION['Email_Add'];
      $email = addslashes($email);

     //send email here
     send_mail($email,'Thank You For Shopping' ,"Your Order Identification # " .$PID. "<div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total :  ₱".$price_total." </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$uname."</span> </p>
            <p> your number : <span>".$number."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your address : <span>".$street.", ".$barangay.", ".$city.", - ".$zip_code."</span> </p>
            <p> your payment mode : <span>".$method."</span> </p>
            <p>(*pay when product arrives*)</p>
         </div>
         </div>
      </div>, Pls wait for your order to arrived, Thank you.");
		   };


   if($detail_query){
	
      echo "
     <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total :  ₱".$price_total." </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$uname."</span> </p>
            <p> your number : <span>".$number."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your address : <span>".$street.", ".$barangay.", ".$city.", - ".$zip_code."</span> </p>
            <p> your payment mode : <span>".$method."</span> </p>
            <p>(*pay when product arrives*)</p>
         </div>
            <a href='../RFGELITE/orderstatus.php' class='btn'>View Order</a>
         </div>
      </div>
      ";
   }
}

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
			 $select_cart = mysqli_query($con, "select products.name,products.price,cart.Qty from cart inner join products on products.id=cart.Item_ID INNER JOIN inventory ON products.id = inventory.supply_id where cart.Account_ID='$user_id' Group By inventory.supply_id");
			  $total = 0;
			  $grand_total = 0;
			     $vat =0;
			    if(mysqli_num_rows($select_cart) > 0){
				while($fetch_cart = mysqli_fetch_assoc($select_cart)){
				   { 
				foreach( $select_cart as $fetch_cart) :	
				$quantity=$fetch_cart['Qty'];
				$total = $fetch_cart['price'] * $quantity;
				$grand_total += $total;
                $vat =   ($grand_total/ 100) * 12;        
		  ?> <tbody>
                <tr>
                  <td style="display:none;" ><?= $fetch_cart['supply_id']; ?></td>
                  <td><?= $fetch_cart['name']; ?></td>
                  <td><?= $fetch_cart['Qty']; ?></td>
                  <td><?= number_format((float)  $fetch_cart['price'], 2, '.', ','); ?></td>
				  <td><?= number_format((float)  $fetch_cart['Qty'] * $fetch_cart['price'], 2, '.', ','); ?></td>
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
     if(confirm('Do you want see your order?')){
    window.location.href='orderstatus.php';
    } else {
    window.location.href='productstore.php';
    }
      </script>";
		  }
		  ?>

<!--               <div class="form">
                <form action="/action_page.php">
                    <h4 style="color: #18A6E3;">Methods of Payment</h4>
                    <input type="radio" id="gcash" name="gcash" value="gcash">
                    <img src="https://ww1.freelogovectors.net/wp-content/uploads/2023/01/gcash-logo-freelogovectors.net_.png?lossy=1&ssl=1"><br>
                    <input type="radio" id="paymaya" name="paymaya" value="paymaya">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/PayMaya_Logo.png/1200px-PayMaya_Logo.png"><br>
                    <input type="radio" id="cod" name="cod" value="cod">
                    <img src="https://www.getnow.pk/wp-content/uploads/2020/06/cash-on-delivery-logo-01.png"><br> 
                </form>
              </div>    -->
             
<!--                     <h4 style="color: #18A6E3;">Billing Address</h4>
                    <input type="radio" id="bilad" name="bilad" value="bilad">
                    <label for="bilad">Use a different billing Address</label><br>
                    <input type="radio" id="shipad" name="shipad" value="shipad">
                    <label for="shipad">Same as shipping address</label><br>   -->
                         
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
          <div class="buttongroup">
			    <input type="submit" value="order now" name="order_btn" class="btn">
          <div class="Cbtn">
 				  <a class="button" href="cart.php"> Cancel</a>
          </div>
          </div>
      </form>
      </div>
	
      </div>
    </div>
<?php 
require 'include/footer.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/js/main.js"></script>
<script src="/js/script.js"></script>
</body>
</html>