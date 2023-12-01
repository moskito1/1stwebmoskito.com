<?php
session_start();
include('dbconnection.php');

if (isset($_POST['cart'])) {
    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit();
    }

    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_img = $_POST['product_img'];
    $product_size = $_POST['product_size'];
    $product_price = $_POST['product_price'];
    $quantity = $_POST['quantity'];

    $username = $_SESSION['username'];

    // Check if the product is already in the user's cart in the database
    $query = "SELECT id, quantity FROM cart WHERE username = ? AND prodid = ? AND size = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sis', $username, $product_id, $product_size);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            // Product is already in the cart, update the quantity in the database
            $cart_id = $row['id'];
            $new_quantity = $row['quantity'] + $quantity;

            $update_query = "UPDATE cart SET quantity = ? WHERE id = ?";
            $update_stmt = mysqli_prepare($conn, $update_query);
            if ($update_stmt) {
                mysqli_stmt_bind_param($update_stmt, 'ii', $new_quantity, $cart_id);
                mysqli_stmt_execute($update_stmt);
            }
        } else {
            // Product is not in the cart, insert a new record in the database
            $insert_query = "INSERT INTO cart (username, prodid, prodname, img, price, quantity, size) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)";
            $insert_stmt = mysqli_prepare($conn, $insert_query);
            if ($insert_stmt) {
                mysqli_stmt_bind_param($insert_stmt, 'sisssis', $username, $product_id, $product_name, $product_img, $product_price, $quantity, $product_size);
                mysqli_stmt_execute($insert_stmt);
            }
        }
    }

    header('Location: products.php?id=' . $product_id);
    exit();
}