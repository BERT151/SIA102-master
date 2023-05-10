<?php
	require 'cart/check_if_added.php';
	require 'include/connection.php';  
	require 'include/function.php';  
	include 'include/header.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/itempage.css">
</head>
<body>
  <section>
  	  <?php
	    $id = $_GET['id'];
		$products = "SELECT products.id,products.name,products.photo,products.price,products.description,inventory.supply_id,inventory.qty,inventory.stock_type FROM products INNER JOIN inventory ON products.id = inventory.supply_id where inventory.supply_id = $id AND inventory.stock_type = '1' Group By inventory.supply_id LIMIT 1";
        $products_run = mysqli_query($con, $products);
        if(mysqli_num_rows($products_run) > 0)
        {
        foreach($products_run as $proditems) :

          $image_data = $proditems['photo'];
          $binary_data = base64_decode($image_data);
          $img_src = 'data:image/png;base64,' . base64_encode($binary_data);
      ?>
    <div class="containerr flex">
      <div class="left">
        <div class="main_image">
	    	<img src="<?php echo $img_src; ?>" alt="Images" class="slide">
        </div>
        <!-- <div class="option flex">
          <img src="image/p1.jpg" onclick="img('image/p1.jpg')">
          <img src="image/p2.jpg" onclick="img('image/p2.jpg')">
          <img src="image/p3.jpg" onclick="img('image/p3.jpg')">
          <img src="image/p4.jpg" onclick="img('image/p4.jpg')">
          <img src="image/p5.jpg" onclick="img('image/p5.jpg')">
          <img src="image/p6.jpg" onclick="img('image/p6.jpg')">
        </div> -->
      </div>
      <div class="right">
	   <form method="post" action=cart/cart_add.php?id=<?php  echo $proditems["supply_id"]; ?>>
        <h3><?php echo $proditems["name"]; ?></h3>
        <h1> <big>₱</big> <?php echo $proditems["price"]; ?> </h1><input type="hidden" name="price" value="<?php echo $proditems["price"];?>"></input>
        <p><?php echo $proditems["description"]; ?></p>
      	<?php if(!isset($_SESSION['user'])){  ?>
      	<div class="buy">		
		<p><a href="login.php" role="button">Buy Now</a></p>	
		</div>
		<?php
        }
        else{
        if(check_if_added_to_cart($proditems["supply_id"])){
        echo '<a class="cartdis" href="#" disabled>Added to cart</a>';
        }else{
			?>
        <h5>Quantity:<input type="number" name="qty" id="qty" placeholder="1" min="1" max="<?php echo $proditems['Qty']?>" class="num"/></h5>
       <button>Add to cart</button>
		</form>
      </div>
	  	<?php
		}
		}
		endforeach;
		}
		
		?>
    </div>
  </section> 

  <div class="related">
	<div class="relatedtitle">
	<a>Related Products</a>
	</div>
	<?php
	    $id = $_GET['id'];
		$products = "SELECT products.id,products.name,products.photo,products.price,products.description,inventory.stock_type,inventory.supply_id,inventory.qty,inventory.id FROM products INNER JOIN inventory ON products.id = inventory.supply_id  where inventory.stock_type = '1' ORDER BY RAND() LIMIT 3 ";
        $products_run = mysqli_query($con, $products);
        if(mysqli_num_rows($products_run) > 0)
        {
        foreach($products_run as $proditems) :
      ?>
	<div class="content">
	<form method="post" action=cart/cart_add.php?id=<?php  echo $proditems["supply_id"]; ?>>
	<a  href="itempage.php?id=<?php  echo $proditems["supply_id"]; ?>">
	<img src="Picture/product/<?php echo $proditems["photo"]; ?>" alt="Images">
	<div class="desc">
    <h4><?php echo $proditems["name"]; ?></h4>
    <a></a>
	</div>
	<?php if(!isset($_SESSION['user'])){  ?>
	<div class="rbutton"><a href="../login.php">Buy Now<a></div>
	</div>
	<?php
        }
        else{
        if(check_if_added_to_cart($proditems["id"])){
        echo '<a class="cartdis" href="#" disabled>Added to cart</a>';
        }else{
			?>
     <button>Add to cart</button>
		</form>
      </div>
	  	<?php
		}
		}
		endforeach;
		}
		
		?>
  </div>
</form> 
	<?php
	include 'include/footer.php';
	?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});

    function img(anything) {
      document.querySelector('.slide').src = anything;
    }

    function change(change) {
      const line = document.querySelector('.home');
      line.style.background = change;
    }
	
	const plus = document.querySelector(".plus"),
	minus = document.querySelector(".minus"),
	num = document.querySelector(".num");
	
	let a =1;
	
	plus.addEventListener("click", ()=>{
		a++;
		a= (a < 10) ? + a : a;
		num.innerText = a;
		console.log(a);
	});
	
	minus.addEventListener("click", ()=>{
		if(a>1){
			a--;
			a= (a < 10) ? + a : a;
			num.innerText = a;
		}
	});

</script>

</body>
</html>