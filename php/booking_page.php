<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
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

        .hospital-details {
            margin-bottom: 20px;
        }

        .appointment-details {
            margin-bottom: 20px;
        }

        .confirm-btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .confirm-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="hospital-details">
            <h2>Hospital Details</h2>
            <!-- Add hospital details here -->
        </div>
        <div class="appointment-details">
            <h2>Appointment Details</h2>
            <p>Date: <?php echo isset($_GET['date']) ? htmlspecialchars($_GET['date']) : 'N/A'; ?></p>
        </div>
        <button class="confirm-btn" onclick="confirmAppointment('<?php echo isset($_GET['date']) ? htmlspecialchars($_GET['date']) : ''; ?>')">Confirm Appointment</button>
        <div id="message"></div>
    </div>

    <script>
        function confirmAppointment(date) {
            // Send AJAX request to update the slot
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_calendar_slot.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        document.getElementById('message').innerText = 'Appointment booked successfully!';
                        document.querySelector('.confirm-btn').style.display = 'none';
                    } else {
                        console.error('Error:', xhr.responseText);
                    }
                }
            };
            xhr.send("date=" + encodeURIComponent(date));
        }
    </script>
</body>
</html>
