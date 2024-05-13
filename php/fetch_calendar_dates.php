<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "bot");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch calendar dates and their availability
$sql = "SELECT `date`, `slots` FROM slot";
$result = mysqli_query($conn, $sql);

// Create an associative array to store calendar data
$calendar_data = array();

// Fetch the data and store it in the array
while ($row = mysqli_fetch_assoc($result)) {
    // Assign 'available' or 'unavailable' based on the slot value
    $availability = ($row['slots'] == 1) ? 'available' : 'unavailable';
    // Store the date and availability in the array
    $calendar_data[$row['date']] = $availability;
}

// Close connection
mysqli_close($conn);

// Output the calendar data as JSON
echo json_encode($calendar_data);
?>
