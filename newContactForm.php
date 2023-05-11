<?php

include('includes/head.php');
include('includes/preloader.php');
include('includes/header.php');
?>

<main>
        <!--? Hero Start -->
        <div class="slider-area2">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 pt-70 text-center">
                                <h2>Contact Us</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->





<?php if(isset($_SESSION['admin']))

{
?>

<!--?  Contact Area start  -->
<section class="contact-section">
            <div class="container">
                <div class="d-none d-sm-block mb-5 pb-4">

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.4026807251407!2d120.99149217595559!3d14.633068676279116!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b6738df690e7%3A0xf05f1ccce6512455!2sRFG!5e0!3m2!1sen!2sph!4v1683028080820!5m2!1sen!2sph" width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        
    
                </div>
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Get in Touch</h2>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-contact contact_form" action="newContactFormProcess.php" method="POST">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" placeholder=" Enter Message"></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control" name="email"  type="text"  placeholder="Email" value="<?= $user['Email_Add'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="subject" type="text" placeholder="Enter Subject">
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                <button type="submit" name="submit" value="submit" class="button button-contactForm boxed-btn">Send</button>
                            </div>
                            </div>

                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>57 Angelo, La Loma, Quezon City, Metro Manila</h3>
                                <p>57 Angelo, La Loma, Lungsod Quezon, Kalakhang Maynila</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>+1 253 565 2365</h3>
                                <p>Mon to Fri 9am to 6pm</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>rfg2376@gmail.com</h3>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Area End -->


<?php }else{?>
<section class="contact-section">
<div class="container">
    <div class="d-none d-sm-block mb-5 pb-4">

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.4026807251407!2d120.99149217595559!3d14.633068676279116!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b6738df690e7%3A0xf05f1ccce6512455!2sRFG!5e0!3m2!1sen!2sph!4v1683028080820!5m2!1sen!2sph" width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


    </div>
    <div class="row">
        <div class="col-12">
            <h2 class="contact-title">Get in Touch</h2>
        </div>
        <div class="col-lg-8">
            <form class="form-contact contact_form" action="newContactFormProcess.php" method="POST">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" placeholder=" Enter Message" readonly></textarea>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <input class="form-control" name="email"  type="text"  placeholder="Email" value="" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input class="form-control" name="subject" type="text" placeholder="Enter Subject" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                    <button type="submit" name="submit" value="submit" class="button button-contactForm boxed-btn" disabled>Send</button>
                </div>
                </div>

            </form>
        </div>
        <div class="col-lg-3 offset-lg-1">
            <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-home"></i></span>
                <div class="media-body">
                    <h3>57 Angelo, La Loma, Quezon City, Metro Manila</h3>
                    <p>57 Angelo, La Loma, Lungsod Quezon, Kalakhang Maynila</p>
                </div>
            </div>
            <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                <div class="media-body">
                    <h3>+1 253 565 2365</h3>
                    <p>Mon to Fri 9am to 6pm</p>
                </div>
            </div>
            <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-email"></i></span>
                <div class="media-body">
                    <h3>rfg2376@gmail.com</h3>
                    <p>Send us your query anytime!</p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>


<?php }?>
















</main>

<?php
include 'includes/footer.php';
include 'includes/scripts.php';
?>








