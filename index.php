
<?php
include('includes/head.php');
include('includes/header.php');
require_once('connection.php');
?>


<main>
    <!--? slider Area Start-->
    <div class="slider-area position-relative">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-9 col-md-8 col-sm-9">
                            <div class="hero__caption">
                                <span data-animation="fadeInLeft" data-delay="0.1s">with patrick potter</span>
                                <h1 data-animation="fadeInLeft" data-delay="0.4s">Build Perfect body Shape for good and
                                    Healthy life.</h1>
                                <a href="memberForm.php" class="btn hero-btn" data-animation="fadeInLeft"
                                    data-delay="0.8s">became a member</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-9 col-md-8 col-sm-9">
                            <div class="hero__caption">
                                <span data-animation="fadeInLeft" data-delay="0.1s">with patrick potter</span>
                                <h1 data-animation="fadeInLeft" data-delay="0.4s">Build Perfect body Shape for good and
                                    Healthy life.</h1>
                                <a href="memberForm.php" class="btn hero-btn" data-animation="fadeInLeft"
                                    data-delay="0.8s">became a member</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Video icon -->
        <div class="video-icon">
            <a class="popup-video btn-icon" href="#"><i class="fas fa-play"></i></a>
        </div>
    </div>
    <!-- slider Area End-->

            <!-- category start -->
    <section class="services-area pt-100 pb-150 section-bg" data-background="assets/img/gallery/section_bg01.png">
        <!--? Want To work -->
        <section class="wantToWork-area w-padding">
            <div class="container">
                <div class="row align-items-end justify-content-between">
                    <div class="col-lg-6 col-md-10 col-sm-10">
                        <div class="section-tittle section-tittle2">
                            <span>OUR PRODUCTS CATEGORY FOR YOU</span>
                            <h2>FIND AFFORDABLE PRODUCTS </h2>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3">
                        <a href="#" class="btn wantToWork-btn f-right">More Categories</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Want To work End -->
        <!-- category start -->
        <div class="container">
            <div class="row">
            <?php
                $sql = "select category.Category_ID,category.Ctgry_Name,products.photo,products.category_id from products inner join category on category.Category_ID=products.category_id GROUP BY products.category_id ORDER BY RAND() LIMIT 3 ";
                    $res =mysqli_query($con,$sql);
                    if(mysqli_num_rows($res) > 0){
                    while($row =mysqli_fetch_assoc($res)){
                    $serviceName = $row['Ctgry_Name'];
                    $serviceDes = $row['Category_ID'];

                                            

                echo '<div class="col-lg-4 col-md-4 col-sm-6">';
                    echo'<div class="single-cat text-center mb-50">';
                        echo '<div class="cat-icon">';
                            echo'<i class="flaticon-clock"></i>';
                        echo'</div>';
                        echo'<div class="cat-cap">';
                        echo'<h5><a>'.$serviceName.'</a></h5>';
                        // echo'<p>'.$serviceDes.'</p>';
                        echo'</div>';
                            echo'<div class="img-cap">';
                                echo'<a href="productcategory.php?id= ';
                                echo  $row['Category_ID'];
                                echo ' " class="">Discover Products <i class="ti-arrow-right"></i></a>';
                            echo'</div>';
                    echo'</div>';
                echo'</div>';
                                        
    
                     }
                     }
                     ?>



            </div>
        </div>
    </section>
    <!-- end of category -->
    <!--? About Area Start -->
    <section class="about-area section-padding30">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img ">
                        <img src="assets/img/gallery/about.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about-caption">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle3 mb-35">
                            <span>ABOUT oUR GYM</span>
                            <h2>Safe Body building proper Solutions That Saves our Valuable Time!</h2>
                        </div>
                        <p class="pera-top">Brook presents your services with flexible, convenient and cdpose layouts.
                            You can select your favorite layouts & elements for cular ts with unlimited ustomization
                            possibilities. Pixel-perfect replication of the designers is intended.</p>
                        <p class="mb-65 pera-bottom">Brook presents your services with flexible, convefnient and chient
                            anipurpose layouts. You can select your favorite layouts.</p>
                        <a href="from.html" class="btn">became a member</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About-2 Area End -->

    <!--? About Area Start -->
    <section class="about-area section-padding30" id="calculator">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img ">
                        <img src="Picture/gym.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about-caption">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle3 mb-35">
                            <span>BMI Calculator</span>
                            <h2>Check your BMI</h2>
                        </div>
                        <form name="bmiForm">
                        <div class="group">
                        <Label><p>Your Weight(Kg)</p></Label>
                        <input type="text" name="weight" size="10" required ><br />
                        <Label><p>Your Height(cm)</p></Label>
                        <input type="text" name="height" size="10" required><br />
                        <input type="button" value="Calculate BMI" onClick="calculateBmi()" id="enter" class="enter" ><br />
                        <label for=""><p>BMI</p></label>
                        <input type="text" name="bmi" size="10" readonly><br />
                        <label for=""><p>This Means</p></label>
                        <input type="text" name="meaning" size="25"  readonly><br />
                        <input type="reset" value="Reset" id="reset">    
                        </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About-2 Area End -->


    <!--? Services Area Start -->
    <section class="services-area pt-100 pb-150 section-bg" data-background="assets/img/gallery/section_bg01.png">
        <!--? Want To work -->
        <section class="wantToWork-area w-padding">
            <div class="container">
                <div class="row align-items-end justify-content-between">
                    <div class="col-lg-6 col-md-10 col-sm-10">
                        <div class="section-tittle section-tittle2">
                            <span>OUR sERVICES FOR YOU</span>
                            <h2>PUSH YOUR LIMITS FORWARD We Offer to you</h2>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3">
                        <a href="#" class="btn wantToWork-btn f-right">More Services</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Want To work End -->
        <div class="container">
            <div class="row">
            <?php
                                    $sql = "SELECT * FROM servicetypetbl ORDER BY servicetypetbl.serviceID ASC LIMIT 3  ";
                                    $res =mysqli_query($con,$sql);
                                    if(mysqli_num_rows($res) > 0){
                                        while($row =mysqli_fetch_assoc($res)){
                                            $serviceName = $row['serviceType'];
                                            $serviceDes = $row['serviceDescription'];

                                            

                echo '<div class="col-lg-4 col-md-4 col-sm-6">';
                echo'<div class="single-cat text-center mb-50">';
                   echo '<div class="cat-icon">';
                        echo'<i class="flaticon-clock"></i>';
                    echo'</div>';
                    echo'<div class="cat-cap">';
                        echo'<h5><a href="#">'.$serviceName.'</a></h5>';
                        echo'<p>'.$serviceDes.'</p>';
                    echo'</div>';
                    echo'<div class="img-cap">';
                        echo'<a href="#" class="">Discover More About Us <i class="ti-arrow-right"></i></a>';
                    echo'</div>';
                    echo'</div>';
                    echo'</div>';
                                        
    
                    }
                     }
                     ?>



            </div>
        </div>
    </section>
    <!-- Services Area End -->




    <!--? About-2 Area Start -->
    <section class="about-area2 testimonial-area section-padding30 fix">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-11 col-sm-11">
                    <!-- about-img -->
                    <div class="about-img2">
                        <img src="assets/img/gallery/about2.png" alt="">
                        <!-- Shape -->
                        <div class="shape-qutaion d-none d-sm-block">
                            <img src="assets/img//gallery/qutaion.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-9 col-sm-9">
                    <div class="about-caption">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-55">
                            <span>Client Feedback</span>
                            <h2>What Our Client thik about our gym</h2>
                        </div>
                        <!-- Testimonial Start -->
                        <div class="h1-testimonial-active">

                            <!-- Single Testimonial -->
                            <?php
                                $sql = "SELECT account.Name,reviewtbl.Comments FROM reviewtbl JOIN account ON account.Account_ID = reviewtbl.Account_ID";
                                $res =mysqli_query($con,$sql);
                                if(mysqli_num_rows($res) > 0){
                                    while($row =mysqli_fetch_assoc($res)){
                                        $Name = $row['Name'];
                                        $Reviews = $row['Comments'];
                                        


                                        echo '<div class="single-testimonial">';
                                        echo '<div class="testimonial-caption">';
                                        echo '<p>'.$Reviews.'</p>';
                                        echo '<div class="rattiong-caption">';
                                        echo '<span>'.$Name. ' '.'</span>';  
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                }else{
                                    echo 'There are no feedbacks!';
                                }

                                ?>


                        </div>
                        <!-- Testimonial End -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About-2 Area End -->
    <!--? Gallery Area Start -->
    <div class="gallery-area">
        <div class="container-fluid p-0 fix">
            <div class="row">
                <div class="col-lg-6">
                    <div class="box snake mb-30">
                        <div class="gallery-img big-img"
                            style="background-image: url(assets/img/gallery/gallery1.png);"></div>
                        <div class="overlay">
                            <div class="overlay-content">
                                <a href="gallery.html"><i class="ti-arrow-top-right"></i></a>
                                <h3>Best fitness gallery</h3>
                                <p>Fitness, Body</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box snake mb-30">
                                <div class="gallery-img small-img"
                                    style="background-image: url(assets/img/gallery/gallery2.png);"></div>
                                <div class="overlay">
                                    <div class="overlay-content">
                                        <a href="gallery.html"><i class="ti-arrow-top-right"></i></a>
                                        <h3>Best fitness gallery</h3>
                                        <p>Fitness, Body</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box snake mb-30">
                                <div class="gallery-img small-img"
                                    style="background-image: url(assets/img/gallery/gallery3.png);"></div>
                                <div class="overlay">
                                    <div class="overlay-content">
                                        <a href="gallery.html"><i class="ti-arrow-top-right"></i></a>
                                        <h3>Best fitness gallery</h3>
                                        <p>Fitness, Body</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box snake mb-30">
                                <div class="gallery-img small-img"
                                    style="background-image: url(assets/img/gallery/gallery4.png);"></div>
                                <div class="overlay">
                                    <div class="overlay-content">
                                        <a href="gallery.html"><i class="ti-arrow-top-right"></i></a>
                                        <h3>Best fitness gallery</h3>
                                        <p>Fitness, Body</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box snake mb-30">
                                <div class="gallery-img small-img"
                                    style="background-image: url(assets/img/gallery/gallery5.png);"></div>
                                <div class="overlay">
                                    <div class="overlay-content">
                                        <a href="gallery.html"><i class="ti-arrow-top-right"></i></a>
                                        <h3>Best fitness gallery</h3>
                                        <p>Fitness, Body</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery Area End -->
    <!--? Want To work -->
    <section class="wantToWork-area w-padding">
        <div class="container">
            <div class="row align-items-end justify-content-between">
                <div class="col-lg-6 col-md-9 col-sm-9">
                    <div class="section-tittle">
                        <span>oUR TEAM MAMBERS</span>
                        <h2>Our Most Exprienced Trainers</h2>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3">
                    <a href="#" class="btn wantToWork-btn f-right">More Services</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Want To work End -->


<!--? Team Ara Start -->
   <div class="team-area pb-150">
        <div class="container">
            <div class="row">

            <?php 
            $sql = "SELECT staff_tbl.staffName,servicetypetbl.serviceType,staff_tbl.staffImage FROM staff_tbl INNER JOIN servicetypetbl ON staff_tbl.serviceID = servicetypetbl.serviceID ORDER BY staff_tbl.staffID DESC LIMIT 3";
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($res) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $name = $row['staffName'];
                $pos = $row['serviceType'];
                $simage = base64_encode($row['staffImage']);
                echo '<div class="col-lg-4 col-md-6 col-sm-6">';
                    echo '<div class="single-team mb-30">';
                       echo ' <div class="team-img">';
                       echo '<img src="data:image/jpeg;base64,' .$simage .'"/>';
                           echo ' <div class="team-caption">';
                                echo '<span>'.$pos.'</span>';
                                echo '<h3><a href="#">'.$name.'</a></h3>';
                               
                               echo '<div class="team-social">';
                                   echo '<ul>';
                                        echo '<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>';
                                        echo '<li><a href="#"><i class="fab fa-twitter"></i></a></li>';
                                       echo ' <li><a href="#"><i class="fas fa-globe"></i></a></li>';
                                        echo '<li><a href="#"><i class="fab fa-instagram"></i></a></li>';
                                   echo ' </ul>';
                               echo ' </div>';
                           echo ' </div>';
                       echo ' </div>';
                   echo ' </div>';
               echo '</div>';
            }
            }else{
                echo 'There are no trainers available!';
            }

?>
                
                
            </div>
        </div>
    </div>
    <!-- Team Ara End -->
    <!--? Want To work -->
    <section class="wantToWork-area w-padding section-bg" data-background="assets/img/gallery/section_bg02.png">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-6 col-lg-7 col-md-8 col-sm-10">
                    <div class="wantToWork-caption">
                        <h2>April membership offer available Now</h2>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3">
                    <a href="#" class="btn wantToWork-btn f-right">More Services</a>
                </div>
            </div>
        </div>
    </section>
    <br>


    <?php if (isset($_SESSION['admin'])) {
        ?>

    <!--? Contact form Start -->
    <section class="contact-form-main">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-7 col-lg-7">
                    <div class="form-wrapper">
                        <!--Section Tittle  -->
                        <div class="form-tittle">
                            <div class="row ">
                                <div class="col-lg-11 col-md-10 col-sm-10">
                                    <div class="section-tittle">
                                        <span>Feedback Form</span>
                                        <h2>Feel Free to give your thoughts with us!</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Section Tittle  -->
                        <form id="contact-form" action="feedbackFunction.php" method="POST">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box user-icon mb-30">
                                        <input type="text" name="name" placeholder="Name" value="<?= $user['Name'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box email-icon mb-30">
                                        <input type="text" name="email" placeholder="Phone" value="<?= $user['Contact_Num'] ?>" readonly> 
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6">
                                    <div class="form-box subject-icon mb-30">
                                        <input type="Email" name="subject" placeholder="Email" value="<?= $user['Email_Add'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-box message-icon mb-65">
                                        <textarea name="message" id="message" placeholder="Message"></textarea>
                                    </div>
                                    <div class="submit-info">
                                        <button class="btn" type="submit" name="submit">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact left Img-->
        <div class="from-left d-none d-lg-block">
            <img src="assets/img/gallery/contact_form.png" alt="">
        </div>
    </section>
    <!-- Contact form End -->

    <?php } else { ?>
           <!--? Contact form Start -->
    <section class="contact-form-main">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-7 col-lg-7">
                    <div class="form-wrapper">
                        <!--Section Tittle  -->
                        <div class="form-tittle">
                            <div class="row ">
                                <div class="col-lg-11 col-md-10 col-sm-10">
                                    <div class="section-tittle">
                                        <span>Feedback Form</span>
                                        <h2>Feel Free to give your thoughts with us!</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Section Tittle  -->
                        <form id="contact-form" action="#" method="POST">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box user-icon mb-30">
                                        <input type="text" name="name" placeholder="Name"  readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box email-icon mb-30">
                                        <input type="text" name="email" placeholder="Phone" readonly> 
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6">
                                    <div class="form-box subject-icon mb-30">
                                        <input type="Email" name="subject" placeholder="Email" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-box message-icon mb-65">
                                        <textarea name="message" id="message" placeholder="Message" readonly></textarea>
                                    </div>
                                    <div class="submit-info">
                                        <button class="btn" type="submit" name="submit">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact left Img-->
        <div class="from-left d-none d-lg-block">
            <img src="assets/img/gallery/contact_form.png" alt="">
        </div>
    </section>
    <!-- Contact form End -->

    <?php } ?>
    <!--? Blog Area Start -->
    <section class="home-blog-area section-padding30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-9 col-sm-10">
                    <div class="section-tittle text-center mb-100">
                        <span>rECENT NEWS FORM BLOG</span>
                        <h2>gYM TIPS news fOR YOU THAT selected by us</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="home-blog-single mb-30">
                        <div class="blog-img-cap">
                            <div class="blog-img">
                                <img src="assets/img/gallery/blog1.png" alt="">
                                <!-- Blog date -->
                                <div class="blog-date text-center">
                                    <span>24</span>
                                    <p>Now</p>
                                </div>
                            </div>
                            <div class="blog-cap">
                                <span>Creative derector</span>
                                <h3><a href="#">Footprints in Time is perfect House in Kurashiki</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="home-blog-single mb-30">
                        <div class="blog-img-cap">
                            <div class="blog-img">
                                <img src="assets/img/gallery/blog2.png" alt="">
                                <!-- Blog date -->
                                <div class="blog-date text-center">
                                    <span>24</span>
                                    <p>Now</p>
                                </div>
                            </div>
                            <div class="blog-cap">
                                <span>Creative derector</span>
                                <h3><a href="#">Footprints in Time is perfect House in Kurashiki</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Area End -->
</main>
<?php
include 'includes/footer.php';
include 'includes/scripts.php';
?>