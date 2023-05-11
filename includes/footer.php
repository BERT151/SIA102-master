<footer>
        <!--? Footer Start-->
        <div class="footer-area section-bg" data-background="assets/img/gallery/section_bg03.png">
            <div class="container">
                <div class="footer-top footer-padding">
                    <!-- Footer Menu -->
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>GYM</h4>
                                    <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="productstore.php">Products</a></li>
                                    <li><a href="schedule.php">Appointment</a></li>
                                    <li><a href="cart.php">cart</a></li>
                                    <li><a href="serviceskarate.php">Services</a></li>
                                    <li><a href="developer.php">Meet Developer</a></li>  
                                    </ul>
                                </div>
                            </div>
                        </div>
                          <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>GYM</h4>
                                    <ul>
                                     <?php if(!isset($_SESSION['user'])){  ?>   
                                    <li><a href="verify.php">Register</a></li>
                                     <?php }else{ ?>
                                    <li><a href="memberForm.php">Become Member</a></li>   
                                     <?php   } ?>  
                                    <li><a href="review.php">Testimonial</a></li>
                                    <li><a href="aboutus.php">About Us</a></li>
                                    <li><a href="contactus.php">Contact Us</a></li>
                                    <li><a href="PrivacyPolicy.php">Privacy Policy</a></li>
                                    <li><a href="faq.php">Frequently Ask Questions</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Open hour</h4>
                                    <ul>
                                        <li><a href="#">Monday 11am-7pm</a></li>
                                        <li><a href="#"> Tuesday-Friday 11am-8pm</a></li>
                                        <li><a href="#"> Saturday 10am-6pm</a></li>
                                        <li><a href="#"> Sunday 11am-6pm</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="index.html"><img src="assets/img/logo/rfg60-r.png" alt=""></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p class="info1">RFG Elite is a high-end fitness center that offers state-of-the-art equipment and personalized training programs.</p>
                                    </div>
                                </div>
                                <!-- Footer Social -->
                                <div class="footer-social ">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Bottom -->
                <div class="footer-bottom">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-12">
                            <div class="footer-copy-right text-center">
                                <p>
  Copyright  &copy;<script>document.write(new Date().getFullYear());</script>  All rights reserved  <i class="fa fa-heart" aria-hidden="true"></i><a href="#" target="_blank"></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>