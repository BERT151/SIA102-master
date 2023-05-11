<?php include 'includes/session.php'; ?>
<?php

// Fetch events from database
$result = mysqli_query($con, "SELECT * FROM appointment_tbl");

// Loop through events and create an array for FullCalendar
$events = array();
while ($row = mysqli_fetch_assoc($result)) {
    $event = array();
    $event['id'] = $row['id'];
    $event['title'] = $row['title'];
    $event['start'] = $row['start_datetime'];
    $event['end'] = $row['end_datetime'];
    array_push($events, $event);
}

// Convert PHP array to JSON
echo json_encode($events);
?>