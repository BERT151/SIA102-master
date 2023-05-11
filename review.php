<?php
require 'cart/check_if_added.php';
  include'include/header.php';


    $uuser_products_query="SELECT * FROM review t1 INNER JOIN account t2 ON t1.Account_ID = t2.Account_ID INNER JOIN products t3 ON t1.Product_ID = t3.id ;";
    $uuser_products_result=mysqli_query($con,$uuser_products_query) or die(mysqli_error($con));
    $uno_of_user_products= mysqli_num_rows($uuser_products_result);
    if($uno_of_user_products==0){ 
  
    }else{
    while($row=mysqli_fetch_array($uuser_products_result)){
        $image = $row['Account_Image'];
            $Comment = $row['Comment'];
            $Username= $row['Username'];
            $Rating = $row['Rating'];

    } 
    }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/review.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <body>

    <div class="reviews">
      <div class="inner">
        <h1>REVIEWS</h1>
                
        <div class="row">
            <?php 
                  $uuser_products_result=mysqli_query($con,$uuser_products_query) or die(mysqli_error($con));
                  $uno_of_user_products= mysqli_num_rows($uuser_products_result);
                  $counterr=0;
                  $ii=0;
                
                  while($row=mysqli_fetch_array($uuser_products_result)){     
                  ?>
          <div class="col">
            <div class="rev">
              <img src="Picture/<?php echo $row['Account_Image'];?>" alt="">
              <div class="name"><?php echo $row['Username'];?></div>
              <div class="stars">
			  
			  <!--fas for shaded star-->
			  <!--far for unshaded star-->
			  
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>

              <p>
               <?php echo $row['Comment'];?>
              </p>
            </div>
          </div>
              <?php 
                  $ii++;
                  
                  $counterr=$counterr+1;}
                  ?>    
        </div>
    
      </div>
    </div>
<?php
  include'include/footer.php';
?>
  </body>
</html>
