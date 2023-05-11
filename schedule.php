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
    <!--? Hero Start -->
    <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 text-center pt-70">
                            <h2>Schedule</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <?php if (isset($_SESSION['admin'])) {
        ?>
        <div class="container py-5" id="page-container">
            <div class="row">
                <div class="col-md-8">
                    <div id="calendar"></div>
                </div>
                <div class="col-md-4">
                    <div class=" rounded-0 shadow ">
                        <div class="card-header bg-gradient ">
                            <h2 class="card-title text-center">Schedule Form</h2>
                        </div>
                        <div class="card-body bg-light" style="height:55vh">
                            <div class="container-fluid">
                                <form action="save_schedule.php" method="post" id="schedule-form">
                                    <input type="hidden" name="id" value="">

                                    <div class="form-group mb-2">
                                        <label for="email" class="control-label">Email</label>
                                        <input type="text" class="form-control form-control-lg rounded-0" name="email"
                                            id="email" value="<?php echo ($user['Email_Add']); ?>" readonly>
                                    </div>
                                    <br>
                                    <div class="col-lg-6 col-md-6 mb-30">
                                    <div class="select-itms">
                                        <select name="service" id="title" required>
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
                                </div><br>

                                <div class="col-lg-6 col-md-6 mb-30">
                                    <div class="select-itms">
                                        <select name="staff" id="trainer" required>
                                            <option value="" selected disabled>-- Trainers --</option>
                                            <?php
                                            $sql = "SELECT staff_tbl.staffID,staff_tbl.staffName, servicetypetbl.serviceType FROM staff_tbl,servicetypetbl WHERE servicetypetbl.serviceID = staff_tbl.serviceID";
                                            $result = mysqli_query($con, $sql);
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_assoc($result)){
                                                    $staffID = $row['staffID'];
                                                    $staffName = $row['staffName'];
                                                    $staffPositon = $row['serviceType'];
                                        ?>
                                        <option value="<?= $staffID ?>"><?= $staffName?>&nbsp; &nbsp;<?= $staffPositon?></option>

                                        <?php
                                                }
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div><br>




                                    <div class="form-group mb-2">
                                        <label for="start_datetime" class="control-label">Start</label>
                                        <input type="datetime-local" class="form-control form-control-lg rounded-0"
                                            name="start_datetime" min="<?php echo date('Y-m-d\TH:i'); ?>"
                                            id="start_datetime" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="end_datetime" class="control-label">End</label>
                                        <input type="datetime-local" class="form-control form-control-lg rounded-0"
                                            name="end_datetime" id="end_datetime" min="<?php echo date('Y-m-d\TH:i'); ?>"
                                            required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="status" class="control-label">Status</label>
                                        <input type="text" class="form-control form-control-lg rounded-0"
                                            placeholder="active" name="status" id="status" readonly>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="card-footer bg-light">
                            <div class="text-center">
                                <button class="btn btn-dark btn-sm rounded-0" type="submit"
                                    form="schedule-form">Save</button>
                                <button class="btn btn-light border btn-sm rounded-0" type="reset"
                                    form="schedule-form">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Event Details Modal -->
        <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-0">
                    <div class="modal-header rounded-0">
                        <h5 class="modal-title">Schedule Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body rounded-0">
                        <div class="container-fluid">
                            <dl>
                                <dt class="text-muted">Type</dt>
                                <dd id="title" class="fw-bold fs-4 text-muted"></dd>
                                <dt class="text-muted">Email</dt>
                                <dd id="email" class=""></dd>
                                <dt class="text-muted">Start</dt>
                                <dd id="start" class=""></dd>
                                <dt class="text-muted">End</dt>
                                <dd id="end" class=""></dd>
                                <dt class="text-muted">Status</dt>
                                <dd id="status" class=""></dd>

                            </dl>
                        </div>
                    </div>
                    <div class="modal-footer rounded-0">
                        <div class="text-end">
                            <button type="button" class="btn btn-dark btn-sm rounded-0" id="edit" data-id="">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete"
                                data-id="">Delete</button>
                            <button type="button" class="btn btn-secondary btn-sm rounded-0"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Event Details Modal -->

        <?php
        $session_email = $user['Email_Add'];
        $schedules = $con->query("SELECT appointmenttbl.id,account.Email_Add,servicetypetbl.serviceType,appointmenttbl.email ,appointmenttbl.start_datetime, appointmenttbl.end_datetime, appointmenttbl.status  FROM appointmenttbl INNER JOIN servicetypetbl ON servicetypetbl.serviceID = appointmenttbl.serviceID INNER JOIN account ON appointmenttbl.email = account.Email_Add WHERE email = '$session_email'");
        $sched_res = [];
        foreach ($schedules->fetch_all(MYSQLI_ASSOC) as $row) {
            $row['sdate'] = date("F d, Y h:i A", strtotime($row['start_datetime']));
            $row['edate'] = date("F d, Y h:i A", strtotime($row['end_datetime']));
            $sched_res[$row['id']] = $row;
        }
        ?>
        <?php
        if (isset($con))
            $con->close();
        ?>

    <?php } else { ?>
        <div class="container py-5" id="page-container">
            <div class="row">
                <div class="col-md-8">
                    <div id="calendar"></div>
                </div>
                <div class="col-md-4">
                    <div class=" rounded-0 shadow ">
                        <div class="card-header bg-gradient ">
                            <h2 class="card-title text-center">Appointment Form</h2>
                        </div>
                        <div class="card-body bg-light" style="height:55vh">
                            <div class="container-fluid">
                                <form action="save_schedule.php" method="post" id="schedule-form">
                                    <input type="hidden" name="id" value="">

                                    <div class="form-group mb-2">
                                        <label for="email" class="control-label">Email</label>
                                        <input type="text" class="form-control form-control-lg rounded-0" name="email"
                                            id="email" disabled>
                                    </div>
                                    <br>
                                    <div class="col-lg-6 col-md-6 mb-30">
                                    <div class="select-itms">
                                        <select name="service" id="select2" required>
                                            <option value="" selected disabled>-- Choose service --</option>
                                       
                                        </select>
                                    </div>
                                </div><br>
                                <div class="col-lg-6 col-md-6 mb-30">
                                    <div class="select-itms">
                                        <select name="service" id="select2" required>
                                            <option value="" selected disabled>-- Staff Members --</option>
                                        </select>
                                    </div>
                                </div><br>
                                    <div class="form-group mb-2">
                                        <label for="start_datetime" class="control-label">Start</label>
                                        <input type="datetime-local" class="form-control form-control-lg rounded-0"
                                            name="start_datetime" disabled
                                            id="start_datetime" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="end_datetime" class="control-label">End</label>
                                        <input type="datetime-local" class="form-control form-control-lg rounded-0"
                                            name="end_datetime" id="end_datetime" disabled
                                            required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="status" class="control-label">Status</label>
                                        <input type="text" class="form-control form-control-lg rounded-0"
                                            placeholder="active" name="status" id="status" readonly>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="card-footer bg-light">
                            <div class="text-center">
                                <button class="btn btn-dark btn-sm rounded-0" type="submit"
                                    form="schedule-form">Save</button>
                                <button class="btn btn-light border btn-sm rounded-0" type="reset"
                                    form="schedule-form">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <?php } ?>
    </body>
    <script>
        var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
    </script>
    <script src="./fullcalendar/js/script.js"></script>
<?php
    include 'includes/footer.php';
    include 'includes/scripts.php';
?>
    </html>