
<footer class="footer">
    <div class="container">
        <div class="rowe">
            <div class="footer-col">
                <h4>GYM</h4>
                <ul>
				    <li><a href="index.php">Home</a></li>
                    <li><a href="productstore.php">Products</a></li>
                    <li><a href="#">Appointment</a></li>
                    <li><a href="cart.php">cart</a></li>
                    <li><a href="serviceskarate.php">Services</a></li>
                    <li><a href="programmer.php">Meet Developer</a></li>

                                        
                </ul>
            </div>
            <div class="footer-col">
                <h4>Quick Link</h4>
                <ul>
                    <li><a href="verify.php">Register</a></li>
                    <li><a href="review.php">Testimonial</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="contactus.php">Contact Us</a></li>
                    <li><a href="PrivacyPolicy.php">Privacy Policy</a></li>
                    <li><a href="faq.php">Frequently Ask Questions</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Gym Schedule</h4>
                <ul>
                    <li><a>OPEN HOURS</a></li>
                    <li><a href="#">Monday 7am-10pm</a></li>
                    <li><a href="#">Tuesday-Friday 10am-9pm</a></li>
                    <li><a href="#">Saturday 8am-8pm</a></li>
                    <li><a href="#">Sunday 9am-11pm</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <a href="index.html">
                    <div class="footerlogo">
                        <img src="assets/img/logo/rfg60-r.png" alt="">
                    </div>
                </a>
                <p>RFG Elite is a high-end fitness center that offers state-of-the-art equipment and personalized training programs.</p>
				<div class="lcenter">
                <div class="social-links">
                    <a href="https://www.facebook.com/profile.php?id=100090099550141"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>      
                </div>
                <?php if(!isset($_SESSION['user'])){  ?>   
				   <div class="loginbutton">
                    <a href="login.php" class="login">Login</a>    
                     </div>
                <?php }else{ ?>
                    <!--    <div class="loginbutton">
                    <a href="login.php/?logout='1'" class="login">Log Out</a>   
                      </div> -->
                <?php   } ?>  
               
            </div>
			</div>
        </div>
    </div>
	<br>
<hr>
	<div class="bf">
    Copyright ©	<a href="#"><i class="fas fa-dumbbell"></i> 2023</a> </span> | all rights reserved.
	</div>
	</footer>
</section>
