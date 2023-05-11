<?php include 'includes/session.php'?>

<?php if(!isset($_SESSION['user'])){  ?>     
        <?php echo ''?>
        <?php }
        else{

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
        }
    ?>
<form action="include/function.php" metod="post">
    <header>

        <!--? Header Start -->
        <div class="header-area header-transparent">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                                <a href="index.php"><img src="assets/img/logo/rfg60-r.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <div class="menu-main d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="productstore.php">Products</a></li>
                                            <li><a href="developer.php">Developers</a></li>
                                            <li><a href="schedule.php">Schedule</a></li>
                                            <li><a href="gallery.php">Gallery</a></li>
                                            <li><a href="newContactForm.php">Contact</a></li>

                                            <li><a ><ion-icon name="chatbubbles-outline"></ion-icon></a></li>

                                            <?php
                                            if (isset($_SESSION['user'])) {
                                            if($ccounter < 0){
                                            echo '<li><a href=" cart.php"><ion-icon name="cart-outline"></ion-icon>';
                                            }else{
                                            echo '<li><a href=" cart.php"><ion-icon name="cart-outline"></ion-icon><span class="notif">';
                                            echo $ccounter;
                                            echo '</span></a></li>';
                                            }
                                            }else{
                                            echo '<li><a href=" cart.php"><ion-icon name="cart-outline"></ion-icon>';   
                                            }
                                            ?>
                                            <?php if (isset($_SESSION['user'])) {?>
                                                <li><a href="user-profile.php">
                                                        <ion-icon name="person-circle-outline"></ion-icon>
                                                    </a></li>

                                                <button class="btn btn-light" type="submit" id="btn" value="Login"
                                                    name="logout">Logout</button>
                                            <?php }else {

                                                echo '<li><a href="login.php">SignIn</a></li>';
                                                 } ?>



                                        </ul>
                                    </nav>
                                </div>

                                <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                    <?php if(isset($_SESSION['user'])){
                                        
                                        if($user['Status']=='Member'){
                                            echo '<a href="memberForm.php" class="btn header-btn" style="display:none;">Bdasdaser</a>';
                                        }else{
                                            echo '<a href="memberForm.php" class="btn header-btn">Become a member</a>';
                                        }
                                    }else{
                                        echo'<a href="login.php" class="btn header-btn">Become a member</a>';
                                        
                                    }
                                    ?>
                                    
                                </div>


                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
</form>