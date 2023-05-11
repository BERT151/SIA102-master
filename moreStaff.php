<?php
include('includes/head.php');
include('includes/header.php');
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFG Appointment</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
    <script src="./fullcalendar/js/jquery-3.6.0.min.js"></script>
    <script src="./fullcalendar/js/bootstrap.min.js"></script>
    <script src="./fullcalendar/lib/main.min.js"></script>
    <style>
        * {
            font-size: 16px;
        }
    </style>
</head>

<main>



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
            if(mysqli_num_rows($result) > 0){
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
    </section>
    <!-- Services Area End -->

<?php
    include 'includes/footer.php';
    include 'includes/scripts.php';
?>
    </html>