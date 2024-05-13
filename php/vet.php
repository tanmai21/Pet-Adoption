<?php
require_once "footer.php";
    require_once "navbar.php";

    require_once "db_connect.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vet Appointment Calendar</title>
<link rel="Stylesheet" href="../css/libraryArticles.css">
    <link href ="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"  rel= "stylesheet" integrity ="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"  crossorigin= "anonymous">

   <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0f0f0;
    }

    .container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .header {
        background-color: #007bff;
        color: #fff;
        text-align: center;
        padding: 10px 0;
        font-size: 1.5rem;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .calendar {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 0;
    }

    .day {
        background-color: #f2f2f2;
        text-align: center;
        width: 100px; /* Adjusted width */
        height: 40px; /* Adjusted height */
        line-height: 40px; /* Center content vertically */
        cursor: pointer;
        border: 1px solid black;
        margin: 0;
        padding: 0;
    }

    .day:hover {
        background-color: #d9d9d9;
    }

    .booked {
        background-color: yellow !important;
    }
</style>

</head>
<body>
 <?= $nav ?>
<br/>
    <h3 style="color:blue;text-align:center;">Schedule Your Veterinary Appointment Today!</h3>
    <div class="container">
        <div class="header">May 2024</div>
        <div class="calendar" id="calendar"></div>
    </div>

    <script>
        // Fetch calendar data from PHP script
        fetch('fetch_calendar_dates.php')
            .then(response => response.json())
            .then(data => {
                // Create the calendar HTML based on the fetched data
                const calendar = document.getElementById('calendar');
                for (const date in data) {
                    const day = document.createElement('div');
                    day.className = 'day';
                    day.textContent = date; // Only display the date
                    day.style.backgroundColor = data[date] === 'available' ? 'yellow' : 'gray';
                    if (data[date] === 'available') {
                        day.onclick = function() {
                            window.location.href = 'booking_page.php?date=' + date; // Redirect to booking page
                        };
                    } else {
                        day.onclick = function() {
                            alert('Slot is already booked.'); // Show alert for booked slot
                        };
                    }
                    calendar.appendChild(day);
                }
            })
            .catch(error => console.error('Error fetching calendar data:', error));
    </script>
<?= $footer ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>
