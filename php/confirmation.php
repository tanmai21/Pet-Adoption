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
    <title>Confirmation</title>
    <link rel="stylesheet" href="../css/update.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        /* Additional CSS styles */
        .dog-card {
            width: 300px;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .dog-card img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .dog-card h3 {
            margin-bottom: 5px;
        }

        .dog-card p {
            margin-bottom: 15px;
        }

        h2 {
            color: #333;
            margin-top: 20px;
        }

        .success-message {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
<?= $nav ?>
    <div class="container mt-5">
        <h2 class="text-center">Adoption Request Confirmation</h2>

        <?php
        // Database connection
        $conn = mysqli_connect("localhost", "root", "", "be19_cr5_animal_adoption_sarközi_stefanie");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $dogs1 = array(
            array("image" => "../images/dog11.jpg", "name" => "Max", "breed" => "Labrador Retriever"),
            array("image" => "../images/dog12.jpg", "name" => "Bella", "breed" => "German Shepherd"),
            array("image" => "../images/dog13.jpg", "name" => "Charlie", "breed" => "Golden Retriever")
        );

        $dogs2 = array(
            array("image" => "../images/cat11.jpg", "name" => "Buddy", "breed" => "Beagle"),
            array("image" => "../images/cat12.jpg", "name" => "Daisy", "breed" => "Boxer"),
            array("image" => "../images/cat13.jpg", "name" => "Lucy", "breed" => "Poodle")
        );

        $prevpet = $_GET['prevpet'] ?? "";

        if ($_GET['livingcondition'] < 10  && $prevpet == "dog") {
            echo "<h2 class='text-center'>The pet you have chosen might not survive such extreme temperatures. Please choose a pet from the below-listed items</h2>";
            echo "<div class='d-flex flex-wrap justify-content-center'>";
            foreach ($dogs1 as $dog) {
                echo "<div class='dog-card'>";
                echo "<img src='{$dog['image']}' alt='{$dog['name']}'>";
                echo "<h3>{$dog['name']}</h3>";
                echo "<p>Breed: {$dog['breed']}</p>";
                echo "<a href='#' class='btn btn-primary take-me-home'>Take Me Home</a>";
                echo "</div>";
            }
            echo "</div>";
        } elseif ($_GET['livingcondition'] > 10 && $prevpet != "dog") {
            echo "<h2 class='text-center'>It is not recommended for a dog and cat to be together. Please choose another pet</h2>";
            echo "<div class='d-flex flex-wrap justify-content-center'>";
            foreach ($dogs2 as $dog) {
                echo "<div class='dog-card'>";
                echo "<img src='images/{$dog['image']}' alt='{$dog['name']}'>";
                echo "<h3>{$dog['name']}</h3>";
                echo "<p>Breed: {$dog['breed']}</p>";
                echo "<a href='#' class='btn btn-primary take-me-home'>Take Me Home</a>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "<div class='success-message'>Your adoption request is successful.</div>";

            // Get the ID from the URL
            $id = $_GET['id'] ?? '';

            // If ID is provided, update the database status attribute to 0
            if (!empty($id)) {
                // Prepare the SQL statement
                $sql = "UPDATE animals SET status = '0' WHERE id = '$id'";

                // Execute the SQL statement
                if (mysqli_query($conn, $sql)) {
                    echo "<div class='success-message'>Database record updated successfully!</div>";
                } else {
                    echo "<div class='success-message'>Error updating database record: " . mysqli_error($conn) . "</div>";
                }
            }
        }

        // Close database connection
        mysqli_close($conn);
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Add event listener to "Take Me Home" buttons
            const takeMeHomeButtons = document.querySelectorAll(".take-me-home");
            takeMeHomeButtons.forEach(button => {
                button.addEventListener("click", function() {
                    // Display success message
                    document.querySelector(".container").innerHTML = "<div class='success-message'>Your adoption request is successful.</div>";
                });
            });
        });
    </script>
<?= $footer ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>
