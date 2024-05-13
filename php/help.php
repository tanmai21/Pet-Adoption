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
    <title>Help Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="Stylesheet" href="../css/libraryArticles.css">
    <link href ="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"  rel= "stylesheet" integrity ="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"  crossorigin= "anonymous">

</head>
<body>
 <?= $nav ?>
    <div class="container mt-5">
        <h2 class="mb-4">Pet Rescue Form</h2>
        <form id="helpForm">
            <div class="form-group">
                <label for="breed">Breed:</label>
                <input type="text" class="form-control" id="breed" name="breed" required>
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>
            <div class="form-group">
                <label for="question1">Question 1:</label>
                <input type="text" class="form-control" id="question1" name="question1">
            </div>
            <div class="form-group">
                <label for="question2">Question 2:</label>
                <input type="text" class="form-control" id="question2" name="question2">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div id="message" class="mt-3"></div>
    </div>

    <script>
        document.getElementById("helpForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent default form submission
            
            // Simulate submission process
            setTimeout(function() {
                // Show message
                document.getElementById("message").innerHTML = "<h2>We will reach out as soon as possible. Thanks for reporting.</h2>";
            }, 1000); // 1 second delay to simulate processing
        });
    </script>
<?= $footer ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>
