<?php
require "connection.php";
?>
<?php if(!isset($_SESSION['user'])){  ?>     
		<?php echo ''?>
        <?php }
        else{


        $ONE = '1';
        //// counter for cart////

        $user_id=$_SESSION['id'];
        
		$user_products_query="SELECT * FROM cart INNER JOIN products ON cart.Item_ID = products.id INNER JOIN inventory ON cart.Item_ID = inventory.supply_id where cart.Account_ID='$user_id' and inventory.qty != 0  Group By inventory.supply_id ";
		$user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
		$no_of_user_products= mysqli_num_rows($user_products_result);
		$sum=0;
		if($no_of_user_products==0)
		$user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
        $no_of_user_products= mysqli_num_rows($user_products_result); 
        $ccounter=0;
        while($row=mysqli_fetch_array($user_products_result)){
		$ccounter=$ccounter+1;}
		$ccounter = ltrim($ccounter, "0");  

         //// counter for order////
	
        $ouser_products_query="select it.Product_ID,it.Order_ID,it.Account_ID,qty  from products ut inner join transaction it on it.Product_ID=ut.id where it.Account_ID='$user_id' group by Order_ID";
        $ouser_products_result=mysqli_query($con,$ouser_products_query) or die(mysqli_error($con));
        $ono_of_user_products= mysqli_num_rows($ouser_products_result);
        $osum=0;
        if($ono_of_user_products==0)
        $ouser_products_result=mysqli_query($con,$ouser_products_query) or die(mysqli_error($con));
        $ono_of_user_products= mysqli_num_rows($ouser_products_result);
        $ocounter=0;
        while($row=mysqli_fetch_array($ouser_products_result)){
        $ocounter=$ocounter+1;}
        $ocounter = ltrim($ocounter, "0");  

        //// counter for wishlist////

        $wuser_products_query="select it.Product_ID,it.Account_ID from products ut inner join wishlist it on it.Product_ID=ut.id where it.Account_ID='$user_id'";
        $wuser_products_result=mysqli_query($con,$wuser_products_query) or die(mysqli_error($con));
        $wno_of_user_products= mysqli_num_rows($wuser_products_result);
        $wsum=0;
        if($wno_of_user_products==0)
        $wuser_products_result=mysqli_query($con,$wuser_products_query) or die(mysqli_error($con));
        $wno_of_user_products= mysqli_num_rows($wuser_products_result);
        $wcounter=0;
        while($row=mysqli_fetch_array($wuser_products_result)){
        $wcounter=$wcounter+1;}
        $wcounter = ltrim($wcounter, "0");  


        $usery="select Account_Image from account where Account_ID='$user_id'";
        $usert=mysqli_query($con,$usery) or die(mysqli_error($con));
        $nos=mysqli_fetch_array($usert);


          $image_data = $nos['Account_Image'];
          $binary_data = base64_decode($image_data);
          $img_src = 'data:image/png;base64,' . base64_encode($binary_data);

          $sql = mysqli_query($con, "SELECT * FROM account WHERE Account_ID = '$user_id'");
          $nos= mysqli_fetch_assoc($sql);
          }


          
        ?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> RFG ELITE | Health & Fitness </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- script -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src=" js/chat.js"></script>
    <script src=" js/main.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
	<link rel="stylesheet" href=" css/header.css" >
    <link rel="stylesheet" href=" css/chatbot.css" >
	<link rel="stylesheet" href=" css/scroll.css">
	<link rel="stylesheet" href=" css/chat.css">
    <link rel="stylesheet" href=" css/style.css">
    <link rel="stylesheet" href=" css/tips.css">
    <link rel="stylesheet" href=" css/footer.css">
    <link rel="stylesheet" href=" css/product.css">
</head>
<body>
<header>
<div class="logo">
    <a href="index.php"><img src="assets/img/logo/rfg60-r.png" alt=""></a>
</div>
<div id="menu" class="fas fa-bars"></div>
<nav class="navbar">

    <ul>
	<?php if(!isset($_SESSION['user'])){  ?>
	    <!--<li><input style="padding:10px; width:200px; height:20px; border:none; margin-right:-20px; margin-top:-2px; float:left; border-radius: 20px;"><a style="color:#0F6292;"class="fas fa-search"></a></input></li>-->
        <li><a href=" index.php">Home</a></li>
        <li><a href=" productstore.php" >Products</a></li>
		<li><a href=" login.php" >Schedule</a></li>  
        <li><a href=" developer.php" >Developer</a></li>
        <li><a href=" contact.php" >Contact</a></li>
        <li><a href=" gallery.php" >Gallery</a></li>
        <li><a class="dropbtn" href=" serviceskarate.php">Services</a></li>
		<li><a href=" login.php"><ion-icon name="chatbubbles-outline"></ion-icon></a></li>	
        <!-- <li><a href="#calculator">BMI Calculator</a></li> -->
        <!-- <li><a href="#about">About Us</a></li> -->
		<li><a href=" login.php"><ion-icon name="cart-outline"></ion-icon></a></li>
        <li><a href="login.php">SignIn</a></li>
		</div>
		<li><a class="member" href=" login.php" style="color:#fff;">Become a Member</a></li>       
		<?php
        }
        else{
		echo '<li><a href=" index.php">Home</a></li>';		
		echo '<li><a href=" productstore.php" >Products</a></li>';
		echo '<li><a href=" developer.php" >Developer</a></li>';
        echo '<li><a href=" schedule.php" >Schedule</a></li>';
        echo '<li><a href=" gallery.php">Gallery</a></li>';
        echo '<li><a href=" contact.php" >Contact</a></li>';
        // echo '<li><a href=" gallery.php" >Gallery</a></li>';
		// echo '<li><a class="dropbtn" href=" serviceskarate.php">Services</a></li> ';
		echo '<li class="mtrigger"><a href="#"><ion-icon name="chatbubbles-outline"></ion-icon></a></li> ';
		if($ccounter < 0){
		echo '<li><a href=" cart.php"><ion-icon name="cart-outline"></ion-icon>';
		}else{
		echo '<li><a href=" cart.php"><ion-icon name="cart-outline"></ion-icon>';
		echo $ccounter;
		echo '</a></li>';
		}
        echo '<li  class="trigger" ><a><ion-icon name="person-circle-outline"></ion-icon></a></li>';
        echo '<li ><a class="btna" href="login.php/?logout=$ONE">LOGOUT</a></li>';
        echo '<li ><a class="btna">BECOME A MEMBER</a></li>';				
		}
        ?>
        <!-- <button onclick="myFunction()" class="Btn2"><i class="fa fa-sun"></i></button> -->
    </ul>
</nav>
</header>
<div class="modal" data-mdb-backdrop="false" data-mdb-keyboard="true">
    <div class="modal-content">
        <span class="close-button">&times;</span>
	<div class="mc">
           <span><?php echo $nos['Fname']. " " . $nos['Lname'] ?></span>

	<div class="mpicture">
		<img src="<?php echo $img_src; ?>" alt="Avatar">
	</div>

	<div class="contentm">

        <?php
        if($ocounter <= 0){
        echo '<a href=" productstore.php">Add Order </a>';
        }else{
        echo '<a href=" orderstatus.php">My Order   ';
        echo $ocounter;
        echo '</a>';
        }
        ?>
        <?php
        if($wcounter <= 0){
        echo '<a href=" productstore.php">Add Wishlist </a>';
        }else{
        echo '<a class="watrigger">My Wishlist   ';
        echo $wcounter;
        echo '</a>';
        }
        ?>
        <a class="etrigger" href="user-profile.php">Edit Info</a>
		<a href=" Index.php#calculator">BMI</a>
		<a href="#">Setting</a>
		<div class="logout">
			<a href=" login.php/?logout='1'">Log Out</a>
		</div>
	</div>
	</div>
    </div>
</div>


<!--- wishlist modal -->

<div class="wmodal" data-mdb-backdrop="false" data-mdb-keyboard="true">
    <div class="wmodal-content">
    <span class="wclose-button">&times;</span>
    <div class="messagec">
    <div class="contentm">
    <a class="watrigger" >My Wishlist</a>
        
        <table class="cart-table account-table table table-bordered">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>

                <?php
             
                    $wishsql = " SELECT products.id, products.name, wishlist.wishlist_id, wishlist.Account_ID, wishlist.Product_ID FROM wishlist INNER JOIN products ON wishlist.Product_ID = products.id  where wishlist.Account_ID='$user_id'";
                    $wishres = mysqli_query($con, $wishsql);
                    while($wishr = mysqli_fetch_assoc($wishres)){
                ?>
                    <tr>
                        <td>
                        <a href=" itempage.php?id=<?php echo $wishr['id']; ?>"><?php echo $wishr['name']; ?></a>
                        </td>
                        <td>
                        <a href=" delwishlist.php?id=<?php echo $wishr['wishlist_id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>    
   
    </div>
    </div>
    </div>
</div>




<!--- edit modal -->


<div class="emodal" data-mdb-backdrop="false" data-mdb-keyboard="true">
    <div class="emodal-content">
    <span class="eclose-button">&times;</span>
    <div class="messagec">
    <div class="contentm">
        <a class="etrigger" >Edit Info</a>
         <form method="post">
                    <div class="column">
                    <p class="modalp">Personal Information</p>
                    <input type="file" name="Account_Image" accept="image/*" />
                    <div class="userinfo">
                     <input type="email" class="userinput" autocomplete="off" placeholder="<?php echo  $nos['Email_Add']?>" value="<?php echo  $nos['Email_Add']?>" name="email">
                    </div>
                    <p class="text-danger"><?php if(isset($errors['e'])) echo $errors['e'];?></p>     
                    <div class="userinfo">
                        <input type="text" class="userinput" autocomplete="off" onkeypress="return restrictAlphabets(event)" placeholder="<?php echo  $nos['Contact_Num']?>" value="<?php echo  $nos['Contact_Num']?>" pattern="^(09|\+639)\d{9}$" name="contact" minlength="11" maxlength="11">
                    </div>
                    <p class="text-danger"><?php if(isset($errors['c'])) echo $errors['c'];?></p>
                    </div>
                    <p class="modalp">Address Information</p>
                    <div class="userinfo">
                    <input type="text" class="userinput" autocomplete="off"  placeholder="<?php echo  $nos['Street']?>"  value="<?php echo  $nos['Street']?>"name="street" minlength="4" maxlength="25" required >
                    <p class="text-danger"><?php if(isset($errors['S'])) echo $errors['S'];?></p>
                    </div>
                    <div class="userinfo">
                    <input type="text" class="userinput" autocomplete="off" placeholder="<?php echo  $nos['Barangay']?>" value="<?php echo  $nos['Barangay']?>"  name="barangay" minlength="4" maxlength="25"   required >
                    <p class="text-danger"><?php if(isset($errors['b'])) echo $errors['b'];?></p>
                    </div> 
                    <div class="userinfo">
                    <input type="text" class="userinput" autocomplete="off" onkeypress="return /^[a-zA-Z-_ ]*$/i.test(event.key)" placeholder="<?php echo  $nos['City']?>" value="<?php echo  $nos['City']?>"  name="city" minlength="5" maxlength="25" required>   
                    <p class="text-danger"><?php if(isset($errors['city'])) echo $errors['city'];?></p>
                    </div>
                    <div class="userinfo">
                    <input type="text" class="userinput" autocomplete="off" onkeypress="return restrictAlphabets(event)" placeholder="<?php echo  $nos['Zip_Code']?>" value="<?php echo  $nos['Zip_Code']?>" minlength="4" maxlength="4" name="zip"  required>
                    <p class="text-danger"><?php if(isset($errors['zip'])) echo $errors['zip'];?></p>
                    </div>
                        <input type="submit"  class="btnR" name="edit_user_info"  value="Save">
                    </div>
                </form>
    </div>
    </div>
    </div>
</div>


<div class="mmodal" data-mdb-backdrop="false" data-mdb-keyboard="true">
    <div class="mmodal-content">
     
	<div class="mmc">
    <div class="wrrapper">
        <div class="title">Chat   <span class="mclose-button">&times;</span></div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                    <p>Hello there, how can I help you?</p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Type something here.." required>
                <button id="send-btn">Send</button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                // start ajax code
                $.ajax({
                    url: ' include/message.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>
	</div>
	</div>
    </div>


<script>
//profile modal//
const modal = document.querySelector(".modal");
const trigger = document.querySelector(".trigger");
const closeButton = document.querySelector(".close-button");

function toggleModal() {
    modal.classList.toggle("show-modal");
}

function windowOnClick(event) {
    if (event.target === modal) {
        toggleModal();
    }
}

trigger.addEventListener("click", toggleModal);
closeButton.addEventListener("click", toggleModal);
window.addEventListener("click", windowOnClick);

//Wish MODAL////

const wmodal = document.querySelector(".wmodal");
const watrigger = document.querySelector(".watrigger");
const wcloseButton = document.querySelector(".wclose-button");

function wtoggleModal() {
    wmodal.classList.toggle("wshow-modal");
}

function wwindowOnClick(event) {
    if (event.target === wmodal) {
        wtoggleModal();
    }
}

watrigger.addEventListener("click", wtoggleModal);
wcloseButton.addEventListener("click", wtoggleModal);
window.addEventListener("click", wwindowOnClick);

//MESSAGE MODAL////

const mmodal = document.querySelector(".mmodal");
const mtrigger = document.querySelector(".mtrigger");
const mcloseButton = document.querySelector(".mclose-button");

function mtoggleModal() {
    mmodal.classList.toggle("show-modal");
}

function mwindowOnClick(event) {
    if (event.target === modal) {
        mtoggleModal();
    }
}

mtrigger.addEventListener("click", mtoggleModal);
mcloseButton.addEventListener("click", mtoggleModal);
mwindow.addEventListener("click", mwindowOnClick);

//EDIT INFO MODAL//

const emodal = document.querySelector(".emodal");
const etrigger = document.querySelector(".etrigger");
const ecloseButton = document.querySelector(".eclose-button");

function wtoggleModal() {
    emodal.classList.toggle("eshow-modal");
}

function ewindowOnClick(event) {
    if (event.target === emodal) {
        etoggleModal();
    }
}

etrigger.addEventListener("click", etoggleModal);
ecloseButton.addEventListener("click", etoggleModal);
window.addEventListener("click", ewindowOnClick);
</script>
 <script src=" javascript/chat.js"></script>
</body>
</html>