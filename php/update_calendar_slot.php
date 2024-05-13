<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "bot");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the date from the POST request
$date = $_POST['date'];

// Prepare the SQL statement
$sql = "UPDATE slot SET slots = '0' WHERE date = '$date'";

// Execute the SQL statement
if (mysqli_query($conn, $sql)) {
    echo "Appointment booked successfully!";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
