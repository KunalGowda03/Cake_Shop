<!-- order_page.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
</head>
<body>

<?php
session_start();

if (!isset($_SESSION['email'])) {
    // Redirect to the sign-in page if the user is not signed in
    header('Location: signin.php');
    exit();
}

?>

<div class="cake-container">
    <!-- Cake images and prices -->
    <div class="cake" data-cake="Pineapple cake" data-price="50">
        <img src="images/pineapple_cake.png" alt="Pineapple Cake">
        <div class="cake-details">
            <span>Pineapple Cake</span>
            <span class="price">Price: 50 Rs</span>
		<hr>
            <br>
            <button class="add-to-cart" onclick="addToCart('Pineapple cake', 50)">Add to Cart</button>
		<div align="right" class="quantity-buttons">
            <button class="quantity-button" onclick="addToCart('Pineapple cake', 50)">+</button>
            <span id="pineappleQty">0</span> <!-- This will show the quantity -->
            <button class="quantity-button" onclick="removeCartItem('Pineapple cake',50)">-</button>
        </div>
        </div>
    </div>

    <div class="cake" data-cake="Black Forest" data-price="70">
        <img src="images/blackforest_cake.png" alt="Black Forest">
        <div class="cake-details">
            <span>Black Forest</span>
            <span class="price">Price: 70 Rs</span>
            <hr>
            <br>
            <button class="add-to-cart" onclick="addToCart('Black Forest', 70)">Add to Cart</button>
		<div align="right" class="quantity-buttons">
            <button class="quantity-button" onclick="addToCart('Black Forest', 70)">+</button>
            <span id="blackforestQty">0</span> <!-- This will show the quantity -->
            <button class="quantity-button" onclick="removeCartItem('Black Forest',70)">-</button>
        </div>
        </div>
    </div>

    <div class="cake" data-cake="Red Velvet" data-price="60">
        <img src="images/redvelvet_cake.png" alt="Red Velvet">
        <div class="cake-details">
            <span>Red Velvet</span>
            <span class="price">Price: 60 Rs</span>
            <hr>
            <br>
            <button class="add-to-cart" onclick="addToCart('Red Velvet', 60)">Add to Cart</button>
		<div align="right" class="quantity-buttons">
            <button class="quantity-button" onclick="addToCart('Red Velvet', 60)">+</button>
            <span id="redvelvetQty">0</span> <!-- This will show the quantity -->
            <button class="quantity-button" onclick="removeCartItem('Red Velvet',60)">-</button>
        </div>
        </div>
    </div>
    <!-- Repeat similar blocks for other cakes -->
</div>

<div class="cart-container">
    <!-- Cart display and checkout -->
    <div id="cart">
        <h2>Cart</h2>
        <div id="cart-items"></div>
        <div>Total Cost: <span id="totalCost">0</span> Rs</div>
        <button onclick="applyCoupon()">Apply Coupon</button>
        <button onclick="buyNow()">Place Order</button>
    </div>
</div>

</body>
</html>
