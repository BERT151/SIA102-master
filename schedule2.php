<?php require_once('connection.php') ?>
<?php
include('includes/head.php');
// include('includes/header.php');
require "$_SERVER[DOCUMENT_ROOT]/RFGELITE/Ecommerce/include/function.php";
require "$_SERVER[DOCUMENT_ROOT]/RFGELITE/Ecommerce/include/header.php";    
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
        :root {
            --fc-small-font-size: 0.1em;
            --fc-page-bg-color: #fff;
            --fc-neutral-bg-color: black;
            --fc-neutral-text-color: #808080;
            --fc-border-color: black;

            --fc-button-text-color: #362b2b;
            --fc-button-bg-color: black;
            --fc-button-border-color: black;
            --fc-button-hover-bg-color: black;
            --fc-button-hover-border-color: black;
            --fc-button-active-bg-color: black;
            --fc-button-active-border-color: black;

            --fc-event-bg-color: black;
            --fc-event-border-color: black;
            --fc-event-text-color: #fff;
            --fc-event-selected-overlay-color: rgba(0, 0, 0, 0.25);

            --fc-more-link-bg-color: #d0d0d0;
            --fc-more-link-text-color: inherit;

            --fc-non-business-color: rgba(215, 215, 215, 0.3);
            --fc-bg-event-color: rgb(143, 223, 130);
            --fc-bg-event-opacity: 0.3;
            --fc-highlight-color: black;
            --fc-today-bg-color: rgba(47, 40, 255, 0.15);
            --fc-now-indicator-color: red;
        }
    </style>
    <style>
        table,
        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 1px !important;
            background-color: white;
        }

        * {
            font-size: 16px;
        }

        .fc-next-button,
        .fc-prev-button,
        .fc-today-button {
            padding: 1px !important;
            width: 50px !important;
            height: 50px;

        }

        .active {
            background-color: black !important;
        }

        .fc-today-button {
            background-color: black !important;
        }
    </style>
    <script>

        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                customButtons: {
                    myCustomButton: {
                        text: 'custom!',
                        click: function () {
                            window.location.href = "index.php";
                        }
                    }
                },
                headerToolbar: {
                    left: 'prev,next,today myCustomButton',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: 'events.php',
                selectable: true,
                themeSystem: 'bootstrap',
                selectHelper: true,

                editable: true,
            });
            calendar.render();
        });

    </script>
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

    <?php if (isset($_SESSION['user'])) {
        ?>
        <div class="container py-5" id="page-container">
            <div class="row">
                <div class="col-md-12">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>

    <?php } else { ?>
        you must login first.

    <?php } ?>
    </body>
    <script>
        var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
    </script>


    </html>