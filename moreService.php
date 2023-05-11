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
        <div class="container">
            <div class="row">
            <?php
                                    $sql = "SELECT * FROM servicetypetbl ORDER BY servicetypetbl.serviceID ";
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

<?php
    include 'includes/footer.php';
    include 'includes/scripts.php';
?>
    </html>