<?php
require_once "footer.php";
    require_once "navbar.php";

    require_once "db_connect.php";



// Function to calculate total price
function calculateTotal($cart) {
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'];
    }
    return $total;
}

// Redirect to home page if cart is empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: index.php");
    exit;
}

// Calculate total price
$totalPrice = calculateTotal($_SESSION['cart']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
 <link rel="Stylesheet" href="../css/libraryArticles.css">
    <link href ="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"  rel= "stylesheet" integrity ="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"  crossorigin= "anonymous">

</head>
<body>
 <?= $nav ?>
    <!-- Header with cart symbol -->
    <header class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h3>Pet Accessories</h3>
                </div>
                <div class="col-6 text-end">
                    <a href="cart.php" class="btn btn-primary">
                        <i class="bi bi-cart"></i> Cart
                        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
                            <span class="badge bg-secondary"><?php echo count($_SESSION['cart']); ?></span>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-5">
        <h4>Shopping Cart</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['cart'] as $item): ?>
                <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td><?php echo $item['name']; ?></td>
                    <td>$<?php echo $item['price']; ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2" class="text-end"><strong>Total:</strong></td>
                    <td>$<?php echo $totalPrice; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
 <?= $footer ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>
