<?php 
   require 'include/function.php';  
     if (!isLoggedIn()) {
     $_SESSION['msg'] = "You must log in first";
     header('location: .login.php');
     exit;
     }
    $Account_ID=$_SESSION['id'];
    $uuser_products_query="select * from transaction ut inner join account it on it.Account_ID=ut.Account_ID where ut.Account_ID='$Account_ID'";
    $uuser_products_result=mysqli_query($con,$uuser_products_query) or die(mysqli_error($con));
    $uno_of_user_products= mysqli_num_rows($uuser_products_result);

    if ($uno_of_user_products == 0) {
     $_SESSION['msg'] = "Order First";
     header('location: productstore.php');

    }
?>
<?php
include'include/connection.php';
include'include/header.php';


    $Account_ID=$_SESSION['id'];
    $uuser_products_query="select * from transaction ut inner join account it on it.Account_ID=ut.Account_ID where ut.Account_ID='$Account_ID' ";
    $uuser_products_result=mysqli_query($con,$uuser_products_query) or die(mysqli_error($con));
    $uno_of_user_products= mysqli_num_rows($uuser_products_result);
    if($uno_of_user_products==0){ 
  
    }else{
    while($row=mysqli_fetch_array($uuser_products_result)){
            $fname = $row['Fname'];
            $lname= $row['Lname'];
            $number = $row['Contact_Num'];
            $email = $row['Email_Add'];
    } 
    }
    $id = $_GET['id'];
    $user_products_query="select * from transaction ut inner join products it on it.id=ut.Product_ID where ut.Account_ID='$Account_ID' and ut.Order_ID = '$id'";
    $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
    $no_of_user_products= mysqli_num_rows($user_products_result);
    $sum=0;
    $total=0;
    $vat=0;
    if($no_of_user_products==0){ 
  
    }else{
    while($row=mysqli_fetch_array($user_products_result)){
            $Name = $row['Name'];
            $street = $row['Street'];
            $barangay = $row['Barangay'];
            $city = $row['City'];
            $zip = $row['Zip_Code'];
            $orderid=$row['Order_ID'];
            $orderstatus=$row['Status'];
            $quantity=$row['Qty'];
            $sum += $quantity*$row['Price'];
            $total = $sum;   
            $vat =   ($total/ 100) * 12;
    } 
    }
    $id = $_GET['id'];
    $Account_ID=$_SESSION['id'];
    $buser_products_query="select DISTINCT Order_ID,Status,Date from transaction where Account_ID='$Account_ID' GROUP BY Order_ID";
    $buser_products_result=mysqli_query($con,$buser_products_query) or die(mysqli_error($con));
    $bno_of_user_products= mysqli_num_rows($buser_products_result);
    if($bno_of_user_products==0){ 
  
    }else{
    while($row=mysqli_fetch_array($buser_products_result)){
            $Date=$row['Date'];
            $orderid=$row['Order_ID'];
            $orderstatus=$row['Status'];
    } 
    }
      $result = mysqli_query($con ,"SELECT * FROM transaction");
       $rresult = mysqli_query($con ,"SELECT * FROM transaction");
?>
<html>
<head>
  <link rel="stylesheet" href="css/order.css">
</head>
<body>
<div class="holder">
  <div class="left">
    <h1>Order</h1>
  <div style="overflow-x:auto; height: 400px; ">   
            <table>
                <thead style="position: sticky; top: 0; padding: 20px; background-color: #fff;">
                    <td>Order ID</td><td>Date Ordered</td><td>Status</td>
                  </thead>
                  <tbody >
                  <?php 
                  $buser_products_result=mysqli_query($con,$buser_products_query) or die(mysqli_error($con));
                  $bno_of_user_products= mysqli_num_rows($buser_products_result);
                  $counter=0;
                  $i=0;
                  while($row = mysqli_fetch_array($rresult)) {
                  while($row=mysqli_fetch_array($buser_products_result)){     
                  ?>
                    <tr><td class="l-col"><a href="order.php?id=<?php  echo $row["Order_ID"]; ?>"><?php  echo $row["Order_ID"]; ?></a></td>
                      <td> <?php echo    $Date;?></td>
                      <td><?php echo $row['Status'];?></td>
                  
                    </tr>
                  <?php 
                  $i++;
                  }
                  $counter=$counter+1;}
                  ?>    
                </tbody>
            </table>
            </div>
  </div>
  <div class="wrapper">
        <div class="border-design top">
            <div class="c1"></div>
            <div class="c2"></div>
            <div class="c3"></div>
            <div class="c4"></div>
            <div class="c5"></div>
        </div>
            <div class="order-header">
                <div class="logo">RFG<span> Lite</span></div>
                <div class="title">Order Details</div>
                <div class="order-number">
                     <?php 
                        $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
                        $no_of_user_products= mysqli_num_rows($user_products_result);
                        {?>
                    <h3>Order ID: <?php echo   $id;?></h3>
                </div>
                <div class="order-status">
                    <h3>Order Status: <?php echo   $orderstatus;?></h3>
                    <h3>Date Ordered: <?php echo    $Date;?></h3>
                    <?php }?>
                </div>
            </div>

            <div class="billing-detail">
               <?php 
                        $uuser_products_result=mysqli_query($con,$uuser_products_query) or die(mysqli_error($con));
                        $uno_of_user_products= mysqli_num_rows($uuser_products_result);
                        {?>
                <p>Billing to</p>
                <p> <?php echo   $fname;?> <?php echo   $lname;?></p>
                <p><span>Contact:</span> <?php echo   $number;?></p>
                <p><span>Email:</span> <?php echo   $email;?></p>
                     <?php }?>
                     <?php 
                        $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
                        $no_of_user_products= mysqli_num_rows($user_products_result);
                        {?>
                <p><span>Address:</span><?php echo   $street;?>, <?php echo   $barangay;?>, <?php echo   $city;?>, <?php echo   $zip;?></p>
                     <?php }?>
            </div>
            <div style="overflow-x:auto; height: 200px; ">   
            <table>
                <thead style="position: sticky; top: 0; background-color: #fff;">
                    <td>Name</td><td>Qty</td><td>Price</td><td>Amount</td>
                </thead>
 
                  <tbody >
                  <?php 
                  $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
                  $no_of_user_products= mysqli_num_rows($user_products_result);
                  $counter=0;
                  $i=0;
                  while($row = mysqli_fetch_array($result)) {
                  while($row=mysqli_fetch_array($user_products_result)){     
                  ?>
                    <tr><td class="l-col"><?php echo $row['name'];?></td>
                      <td></b><?php echo $row['Qty'];?></td>
                      <td><?php echo number_format((float) $row['Price'], 2, '.', ',');?></td>
                      <td class="r-col"><?php echo number_format((float) $row['Price'] * $row['Qty'], 2, '.', ',');?></td>
                    </tr>
                  <?php 
                  $i++;
                  }
                  $counter=$counter+1;}
                  ?>    
                </tbody>
            </table>
            </div>
            <div class="total-section">
                <div class="sub">
                    <p>Sub Total:</p>
                    <p>₱<?php  echo number_format((float)$sum, 2, '.', ',');?></p>
                </div>
                <div class="tax">
                    <p>Tax:</p>
                    <p>₱<?php  echo number_format((float)$vat, 2, '.', ',');?></p>
                </div>

                <div class="sf">
                    <p>Shipping Fee:</p>
                    <p>₱ 50</p>
                </div>
                
                <div class="total">
                    <p>Grand Total:</p>
                    <p>₱<?php  echo number_format((float)$total + $vat + '50', 2, '.', ',');?></p>
                </div>
            </div>

                <div class="payment-terms">
                    <div class="payment-detail">
                      <?php 
                        $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
                        $no_of_user_products= mysqli_num_rows($user_products_result);
                        {?>
                        <p>Payment Info</p>
                        <p><span>Payment #</span>  029012</p>
                        <p><span>Account Name</span> <?php echo   $Name;?></p>
                        <p><span>Method</span> COD</p>
                      <?php }?>
                    </div>

                  <!--   <div class="terms">
                        <p>Terms & Conditions</p>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div> -->

                    <div class="message">
                        <p>Thank you for shopping!</p>
                    </div>
                </div>
        <div class="border-design bottom">
            <div class="c1"></div>
            <div class="c2"></div>
            <div class="c3"></div>
            <div class="c4"></div>
            <div class="c5"></div>
        </div>
    </div>
</div>

<?php 
include'include/footer.php';
?>   


</body>  
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<script type="text/javascript">
  $(".question-wrapper").click( function () {
  var container = $(this).parents(".accordion");
  var answer = container.find(".answer-wrapper");
  var trigger = container.find(".material-icons.drop");
  var state = container.find(".question-wrapper");
  
  answer.animate({height: "toggle"}, 100);
  
  if (trigger.hasClass("icon-expend")) {
    trigger.removeClass("icon-expend");
    // state.removeClass("active");
  }
  else {
    trigger.addClass("icon-expend");
    // state.addClass("active");
  }
  
  if (container.hasClass("expanded")) {
    container.removeClass("expanded");
  }
  else {
    container.addClass("expanded");
  }
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>