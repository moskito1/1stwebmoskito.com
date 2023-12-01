<?php
session_start();
require 'connector.php';

// 1st line pradaks//
//sa site pagpumipili ng size large lang shinoshow pero pag na purchase tama yun size//
$products = array(
    array('id' => 0, 'user_id' => 1, 'Item_Name' => 'Iced Americano', 'size_oz' => 'Original', 'price' => 120.00),
    array('id' => 1, 'user_id' => 2, 'Item_Name' => 'Iced Americano', 'size_oz' => 'Medium', 'price' => 130.00),
    array('id' => 2, 'user_id' => 3, 'Item_Name' => 'Iced Americano', 'size_oz' => 'Large', 'price' => 140.00),

    array('id' => 3, 'user_id' => 4, 'Item_Name' => 'Iced Latte', 'size_oz' => 'Original', 'price' => 125.00),
    array('id' => 4, 'user_id' => 5, 'Item_Name' => 'Iced Latte', 'size_oz' => 'Medium', 'price' => 135.00),
    array('id' => 5, 'user_id' => 6, 'Item_Name' => 'Iced Latte', 'size_oz' => 'Large', 'price' => 145.00),

    array('id' => 6, 'user_id' => 7, 'Item_Name' => 'Cold Brew', 'size_oz' => 'Original', 'price' => 120.00),
    array('id' => 7, 'user_id' => 8, 'Item_Name' => 'Cold Brew', 'size_oz' => 'Medium', 'price' => 130.00),
    array('id' => 8, 'user_id' => 9, 'Item_Name' => 'Cold Brew', 'size_oz' => 'Large', 'price' => 140.00),

    array('id' => 9, 'user_id' => 10, 'Item_Name' => 'Iced Mocha', 'size_oz' => 'Original', 'price' => 130.00),
    array('id' => 10, 'user_id' => 11, 'Item_Name' => 'Iced Mocha', 'size_oz' => 'Medium', 'price' => 140.00),
    array('id' => 11, 'user_id' => 12, 'Item_Name' => 'Iced Mocha', 'size_oz' => 'Large', 'price' => 150.00),

    array('id' => 12, 'user_id' => 13, 'Item_Name' => 'Iced Vanilla Latte', 'size_oz' => 'Original', 'price' => 130.00),
    array('id' => 13, 'user_id' => 14, 'Item_Name' => 'Iced Vanilla Latte', 'size_oz' => 'Medium', 'price' => 140.00),
    array('id' => 14, 'user_id' => 15, 'Item_Name' => 'Iced Vanilla Latte', 'size_oz' => 'Large', 'price' => 150.00),

    array('id' => 15, 'user_id' => 16, 'Item_Name' => 'Iced Caramel Macchiato', 'size_oz' => 'Original', 'price' => 130.00),
    array('id' => 16, 'user_id' => 17, 'Item_Name' => 'Iced Caramel Macchiato', 'size_oz' => 'Medium', 'price' => 140.00),
    array('id' => 17, 'user_id' => 18, 'Item_Name' => 'Iced Caramel Macchiato', 'size_oz' => 'Large', 'price' => 150.00),

    array('id' => 18, 'user_id' => 19, 'Item_Name' => 'Iced Cappucino', 'size_oz' => 'Original', 'price' => 135.00),
    array('id' => 19, 'user_id' => 20, 'Item_Name' => 'Iced Cappucino', 'size_oz' => 'Medium', 'price' => 145.00),
    array('id' => 20, 'user_id' => 21, 'Item_Name' => 'Iced Cappucino', 'size_oz' => 'Large', 'price' => 155.00),

    array('id' => 21, 'user_id' => 22, 'Item_Name' => 'Iced Spanish Latte', 'size_oz' => 'Original', 'price' => 120.00),
    array('id' => 22, 'user_id' => 23, 'Item_Name' => 'Iced Spanish Latte', 'size_oz' => 'Medium', 'price' => 130.00),
    array('id' => 23, 'user_id' => 24, 'Item_Name' => 'Iced Spanish Latte', 'size_oz' => 'Large', 'price' => 140.00),

    array('id' => 24, 'user_id' => 25, 'Item_Name' => 'Vietnamese Iced Coffee', 'size_oz' => 'Original', 'price' => 120.00),
    array('id' => 25, 'user_id' => 26, 'Item_Name' => 'Vietnamese Iced Coffee', 'size_oz' => 'Medium', 'price' => 130.00),
    array('id' => 26, 'user_id' => 27, 'Item_Name' => 'Vietnamese Iced Coffee', 'size_oz' => 'Large', 'price' => 140.00),

    array('id' => 27, 'user_id' => 28, 'Item_Name' => 'Macha Latte', 'size_oz' => 'Original', 'price' => 130.00),
    array('id' => 28, 'user_id' => 29, 'Item_Name' => 'Macha Latte', 'size_oz' => 'Medium', 'price' => 140.00),
    array('id' => 29, 'user_id' => 30, 'Item_Name' => 'Macha Latte', 'size_oz' => 'Large', 'price' => 150.00),

    array('id' => 30, 'user_id' => 31, 'Item_Name' => 'Straberry Milk', 'size_oz' => 'Original', 'price' => 120.00),
    array('id' => 31, 'user_id' => 32, 'Item_Name' => 'Straberry Milk', 'size_oz' => 'Medium', 'price' => 130.00),
    array('id' => 32, 'user_id' => 33, 'Item_Name' => 'Straberry Milk', 'size_oz' => 'Large', 'price' => 140.00),

    array('id' => 33, 'user_id' => 34, 'Item_Name' => 'Lemonade', 'size_oz' => 'Original', 'price' => 120.00),
    array('id' => 34, 'user_id' => 35, 'Item_Name' => 'Lemonade', 'size_oz' => 'Medium', 'price' => 130.00),
    array('id' => 35, 'user_id' => 36, 'Item_Name' => 'Lemonade', 'size_oz' => 'Large', 'price' => 140.00),

    array('id' => 36, 'user_id' => 37, 'Item_Name' => 'Grape Fruit Ade', 'size_oz' => 'Original', 'price' => 120.00),
    array('id' => 37, 'user_id' => 38, 'Item_Name' => 'Grape Fruit Ade', 'size_oz' => 'Medium', 'price' => 130.00),
    array('id' => 38, 'user_id' => 39, 'Item_Name' => 'Grape Fruit Ade', 'size_oz' => 'Large', 'price' => 140.00),

    array('id' => 39, 'user_id' => 40, 'Item_Name' => 'Iced Hibiscus Cooler', 'size_oz' => 'Original', 'price' => 120.00),
    array('id' => 40, 'user_id' => 41, 'Item_Name' => 'Iced Hibiscus Cooler', 'size_oz' => 'Medium', 'price' => 130.00),
    array('id' => 41, 'user_id' => 42, 'Item_Name' => 'Iced Hibiscus Cooler', 'size_oz' => 'Large', 'price' => 140.00),

    array('id' => 42, 'user_id' => 43, 'Item_Name' => 'Iced Chai Tea Latte', 'size_oz' => 'Original', 'price' => 120.00),
    array('id' => 43, 'user_id' => 44, 'Item_Name' => 'Iced Chai Tea Latte', 'size_oz' => 'Medium', 'price' => 130.00),
    array('id' => 44, 'user_id' => 45, 'Item_Name' => 'Iced Chai Tea Latte', 'size_oz' => 'Large', 'price' => 140.00)
);

// 2nd shit pinaka ano to cart//
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// 3rd shit add, incre kung meron na//
if (isset($_POST['add']) && isset($_POST['main'])) {
    $main = $_POST['main'];
    if (isset($products[$main])) {
        if (!isset($_SESSION['cart'][$main])) {
            $_SESSION['cart'][$main] = 0;
        }
        $_SESSION['cart'][$main]++;
    }
}

// 4th shit remove//
if (isset($_POST['remove']) && isset($_POST['main'])) {
    $main = $_POST['main'];
    if (isset($_SESSION['cart'][$main])) {
        $_SESSION['cart'][$main]--;
        if ($_SESSION['cart'][$main] <= 0) {
            unset($_SESSION['cart'][$main]);
        }
    }
}

// 5th total, main pinaka nagdadala ng data ng cart, $products are now the carrier of shit//
$total_price = 0;
$selected_items = array();

foreach ($_SESSION['cart'] as $main => $quantity) {
    if (isset($products[$main])) {
        $total_price += $products[$main]['price'] * $quantity;

        //items into slected items
        $selected_items[] = array(
            'user_id' => $products[$main]['user_id'],
            'Item_Name' => $products[$main]['Item_Name'],
            'size_oz' => $products[$main]['size_oz'],
            'price' => $products[$main]['price'],
            'quantity' => $quantity
        );
    }
}

//6th selected items, products to $name, $price shit//
if (isset($_POST['checkout'])) {
    //record
    foreach ($selected_items as $item) {
        $user_id = $item['user_id'];
        $name = $item['Item_Name'];
        $size = $item['size_oz'];
        $price = $item['price'];
        $quantity = $item['quantity'];

        $sql = "INSERT INTO jordan (id, Item_Name, size_oz, price, quantity) VALUES ($user_id, '$name', '$size', $price, $quantity)";

        if ($conn->query($sql) !== TRUE) {
            echo "Error inserting item: " . $conn->error;
        }
    }

    //para sa total
    $sql = "INSERT INTO jordan (Item_Name, total_price) VALUES ('Total', $total_price)";
    if ($conn->query($sql) !== TRUE) {
        echo "Error inserting total price: " . $conn->error;
    }

    $_SESSION['cart'] = array();
}
    //ayusin ko pa lagyan pic, font, n other shit//
    //pag nagseselect item hindi nasasakop ng padding//
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <style>
        .title_products
        {
            padding-left: 50px;
        }
    
        .products
        {
            width: 500px;
            padding-left: 50px;
        }

        .title_cart
        {
            padding-left: 50px;
        }

        .title_total
        {
            padding-left: 50px;
        }

        .buy_btn
        {
            padding-left: 50px;
        }
    </style>
</head>
<body>
    <h2 class = "title_products">Products</h2>
    <div class = "products">
        <?php foreach ($products as $product): ?>
            <form method="post">
                <?php echo $product['Item_Name']; ?> - <?php echo $product['size_oz']?> - $<?php echo $product['price']; ?>
                <input type="hidden" name="main" value="<?php echo $product['id']; ?>">
                <input class = "add" type="submit" name="add" value="Add"><hr>
            </form>
        <?php endforeach; ?>
    </div>

    <h2 class = "title_cart">Cart</h2>
    <?php foreach ($_SESSION['cart'] as $main => $quantity): ?>
        <?php echo $products[$main]['Item_Name']; ?> - <?php echo $product['size_oz']?> - $<?php echo $products[$main]['price']; ?> x <?php echo $quantity; ?>
        <form method="post">
            <input type="hidden" name="main" value="<?php echo $main; ?>">
            <input type="submit" name="remove" value="Remove">
        </form>
    <?php endforeach; ?>

    <h3 class = "title_total">Total Price: $<?php echo $total_price; ?></h3>

    <form method="post">
        <div class = "buy_btn">
            <input type="submit" name="checkout" value="Buy">
        </div>
    </form>
</body>
</html> 