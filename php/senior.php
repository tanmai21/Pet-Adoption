<?php
require_once "footer.php";
    require_once "navbar.php";

    require_once "db_connect.php";


// Define pet accessories
$petAccessories = [
    ["name" => "Dog Food", "image" => "../images/dogfood.jpg", "price" => 25, "id" => 1],
    ["name" => "Pet Leash", "image" => "../images/petbed.jpg", "price" => 30, "id" => 2],
    ["name" => "Kitten Chain", "image" => "../images/belt.jpg", "price" => 15, "id" => 3],
    ["name" => "Cat Litter", "image" => "../images/catlitter.jpg", "price" => 20, "id" => 4]
];

// Handle adding items to cart
if (isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    $_SESSION['cart'][] = $petAccessories[$productId - 1];
} elseif (isset($_POST['remove_from_cart'])) {
    // Handle removing items from cart
    // Retrieve the product id to remove
    $productId = $_POST['product_id'];

    // Loop through the cart items to find the matching product and remove it
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $productId) {
            unset($_SESSION['cart'][$key]);
            break; // Exit the loop after removing the item
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Accessories</title>
 <link rel="Stylesheet" href="../css/libraryArticles.css">
    <link href ="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"  rel= "stylesheet" integrity ="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"  crossorigin= "anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
</head>
<body>
    <!-- Header with cart symbol -->
  <?= $nav ?>
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
        <div class="row">
            <?php foreach ($petAccessories as $accessory): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?php echo $accessory['image']; ?>" style="height:250px;width:290px;" alt="<?php echo $accessory['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $accessory['name']; ?></h5>
                            <p class="card-text">$<?php echo $accessory['price']; ?></p>
                            <form method="post">
                                <input type="hidden" name="product_id" value="<?php echo $accessory['id']; ?>">
                                <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
                                    <?php $isInCart = in_array($accessory, $_SESSION['cart'], true); ?>
                                    <?php if ($isInCart): ?>
                                        <button type="submit" name="remove_from_cart" class="btn btn-danger">Remove from Cart</button>
                                    <?php else: ?>
                                        <button type="submit" name="add_to_cart" class="btn btn-primary">Add to Cart</button>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <button type="submit" name="add_to_cart" class="btn btn-primary">Add to Cart</button>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
 <?= $footer ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>
