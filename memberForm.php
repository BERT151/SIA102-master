<?php
    require_once('connection.php');
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
                        <div class="hero-cap hero-cap2 text-center pt-70">
                            <h2>New Members</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <?php if(isset($_SESSION['admin'])) {
?>
    <!--? Contact form Start -->
    <div class="contact-form-main mt-100 mb-100">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-7 col-lg-7">
                    <div class="form-wrapper">
                        <!--Section Tittle  -->
                        <div class="form-tittle">
                            <div class="row ">
                                <div class="col-lg-11 col-md-10 col-sm-10">
                                    <div class="section-tittle">
                                        <span>Membership Inquiry</span>
                                        <h2>Become One of Us!</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Section Tittle  -->
                        <form id="contact-form" action="member-inquiry.php" method="POST">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box user-icon mb-30">
                                        <input type="text" name="name" placeholder="Name" value="<?= $user['Name'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box email-icon mb-30">
                                        <input type="text" name="phone" placeholder="Phone" value="<?= $user['Contact_Num'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-30">
                                    <div class="select-itms">
                                        <select name="service" id="select2" required>
                                            <option value="" selected disabled>-- Choose service --</option>
                                        <?php
                                            $sql = "SELECT * FROM servicetypetbl";
                                            $result = mysqli_query($con, $sql);
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_assoc($result)){
                                                    $serviceID = $row['serviceID'];
                                                    $serviceType = $row['serviceType'];
                                                    $serviceDescription = $row['serviceDescription'];
                                        ?>
                                                    <option value="<?= $serviceID ?>"><?= $serviceType ?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box subject-icon mb-30">
                                        <input type="Email" name="email" placeholder="Email" value="<?= $user['Email_Add'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-box message-icon mb-65">
                                        <textarea name="message" id="message" placeholder="Message" name="message" required></textarea>
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
    </div>
    <!-- Contact form End -->
</main>

<?php } else { ?>
   


        <!--? Contact form Start -->
        <div class="contact-form-main mt-100 mb-100">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-7 col-lg-7">
                    <div class="form-wrapper">
                        <!--Section Tittle  -->
                        <div class="form-tittle">
                            <div class="row ">
                                <div class="col-lg-11 col-md-10 col-sm-10">
                                    <div class="section-tittle">
                                        <span>Membership Inquiry</span>
                                        <h2>Become One of Us!</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Section Tittle  -->
                        <form id="contact-form" action="member-inquiry.php" method="POST">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box user-icon mb-30">
                                        <input type="text" name="name" placeholder="Name"  required disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box email-icon mb-30">
                                        <input type="text" name="phone" placeholder="Phone"  required disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-30">
                                    <div class="select-itms">
                                        <select name="service" id="select2" required >
                                        <option value="" selected disabled>-- Choose service --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box subject-icon mb-30">
                                        <input type="Email" name="email" placeholder="Email"  required disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-box message-icon mb-65">
                                        <textarea name="message" id="message" placeholder="Message" name="message" required disabled></textarea>
                                    </div>
                                    <div class="submit-info">
                                        <button class="btn" type="submit" name="submit" disabled>Send Message</button>
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
    </div>

    <?php } ?>


<?php
    include 'includes/footer.php';
    include 'includes/scripts.php';
?>