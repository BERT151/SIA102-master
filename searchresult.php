
<?php
require 'cart/check_if_added.php';
require 'include/connection.php';  
require 'include/function.php';  



 
          
$connect = new PDO("mysql:host=sbit3f-gym-2.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com; dbname=sbit3f", "admin", "sbit3fruben")or exit("Unable to connect");

$one = '1';
$limit = '9';
$page = 1;
if($_POST['page'] > 1)
{
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else
{
  $start = 0;
}
//inventory qty




//fetch product
    $query = "
    SELECT products.id, products.name, products.price,inventory.supply_id, products.photo, products.description, inventory.qty,inventory.stock_type, SUM(qty) AS IN_qty
    FROM products
    INNER JOIN inventory ON products.id = inventory.supply_id where inventory.stock_type = '1'
    ";

if($_POST['query'] != '')
{
  $query .= '
  And products.name LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" 
  ';  
}

$query .= 'Group By supply_id ORDER BY id DESC ' ;

$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();


if($total_data > 0)
{    
    foreach($result as $proditems) :

          $image_data = $proditems['photo'];
          $binary_data = base64_decode($image_data);
          $img_src = 'data:image/png;base64,' . base64_encode($binary_data);

          $f = 0;
          $Product_ID = $proditems['supply_id'];

          $number = number_format($proditems['price'],2);

          $f = 0;
          $Product_ID = $proditems['supply_id'];
          $number = number_format($proditems['price'],2);

          $supply_id = $proditems['supply_id'];
          $outqty = mysqli_query($con, "SELECT SUM(qty) AS OUT_qty FROM inventory where inventory.stock_type = '2' and inventory.supply_id= '$supply_id' ");

          if(mysqli_num_rows($outqty) > 0){
          foreach( $outqty as $fetch_out) :
          $out = $fetch_out["OUT_qty"];

          $inqty = mysqli_query($con, "SELECT SUM(qty) AS IN_qty FROM inventory where inventory.stock_type = '1' and inventory.supply_id='$supply_id' ");
         
          if(mysqli_num_rows($inqty) > 0){
          foreach( $inqty as $fetch_in) :

          $in = $fetch_in["IN_qty"];

 
          $available = $fetch_in["IN_qty"] - $fetch_out["OUT_qty"];

  
  ?>
        
        <div class="content">
        <a  href="itempage.php?id=<?php  echo $proditems["supply_id"]; ?>">
        <img src="<?php echo $img_src; ?>" alt="Images" >
        </a>
        <form method="post" action=cart/cart_add.php?id=<?php  echo $proditems["supply_id"]; ?>>
        <h3><?php echo $proditems["name"]; ?></h3>

        <h4>Available Stock: <?php echo $fetch_in["IN_qty"] - $fetch_out["OUT_qty"]; ?></h4>
        <?php 
                 endforeach;
          }
                   endforeach;
          }?>
       <div class="price"><h6> ₱<?php echo $number;?></h6> <input type="hidden" name="price" value="<?php echo $proditems["price"];?>"></input></div>

     
        <?php if(!isset($_SESSION['user'])){  ?>
           <?php if( $f ==   $proditems['qty']){

        echo '<div class="cartdiss"> <a href="#" disabled>Out of Stock</a> </div>
              <div class="heart"> <a href="#" disabled  class="fa fa-heart"></a> </div>';
         }else{?>
        <div class="vbbuy">
        <p><a href="login.php" role="button" class="buy">Buy Now</a></p> 
        </div>
        <?php }?>
        <?php
        }
        else{
        if(check_if_added_to_cart($proditems["supply_id"])){
        echo '<div class="cartdis"> <a href="#" disabled>Added to cart</a> </div>';
        }

        elseif( $f == $available){
          ?>
        <div class="cartdiss"> <a href="#" disabled>Out of Stock</a></div>
              <div class="heart"><a class="fa fa-heart" href="addwishlist.php?id=<?php echo $proditems["supply_id"]; ?>"></a></div>
        <?php
         }
        else{
        ?>
    <div class="buttongrp">
    <div class="eq">
    <input type="number" name="qty" id="qty" placeholder="1" min="1" max="<?php echo $available; ?>" class="textbox"/>
    </div>
    <div>
    <a class="btn" href="cart/buy_add.php?id=<?php  echo $proditems["supply_id"]; ?>">Buy</a>
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
else
{
echo '
<div class="noitems">
No Items Found
</div>';
}

echo '

<div class="paginations" align="center">
  <ul class="pagination">
';

$total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

//echo $total_links;
  $page_array[]="0";

if($total_links > 4)
{
  if($page < 5)
  {
    for($count = 1; $count <= 5; $count++)
    {
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }
  else
  {
    $end_limit = $total_links - 5;
    if($page > $end_limit)
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
      }
    }
    else
    {

      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $page - 1; $count <= $page + 1; $count++)
      {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
}
else
{
  for($count = 1; $count <= $total_links; $count++)
  {
    $page_array[] = $count;
  }
}
for($count = 1; $count < count($page_array); $count++)
{
  if($page == $page_array[$count])
  {
    $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';

    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0)
    {
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
    }
    else
    {
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Previous</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id >= $total_links)
    {
      $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
    }
    else
    {
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
    }
  }
  else
  {
    if($page_array[$count] == '...')
    {
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
    }
    else
    {
      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
      ';
    }
  }
}

echo $previous_link . $page_link . $next_link;
echo '
  </ul>

</div>
';

echo '';

?>
