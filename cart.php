<?php
session_start();
include('dbconnection.php');

if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit();
}

$username = $_SESSION['username'];

$query = "SELECT * FROM cart WHERE username = ?";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
  mysqli_stmt_bind_param($stmt, 's', $username);
  mysqli_stmt_execute($stmt);
  
  mysqli_stmt_bind_result($stmt, $id, $username, $img, $prodname, $size, $price, $quantity);
  
  $data = array();

  while (mysqli_stmt_fetch($stmt)) {
    $data[] = array(
      'id' => $id,
      'username' => $username,
      'img' => $img,
      'prodname' => $prodname,
      'size' => $size,
      'price' => $price,
      'quantity' => $quantity
    );
  }
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart - Oasis Cafe</title>
</head>
<body>
  <?php include "header.php"; ?>
  <section class="cart">
            <div class="cart-title">
                <h1>MY CART</h1>
            </div>
            <div class="carttitle-container">
                <div class="cart-column product-detail">
                    <p>PRODUCT DETAILS</p>
                </div>
                <div class="cart-column">
                    <p>SIZE</p>
                </div>
                <div class="cart-column">
                    <p>PRICE</p>
                </div>
                <div class="cart-column">
                    <p>QUANTITY</p>
                </div>
                <div class="cart-column">
                    <p>TOTAL</p>
                </div>
                <div class="cart-column">

                </div>
            </div>
            </section>
  <div class="cart-items">
    <?php
    if (count($data) > 0) {
        foreach ($data as $row) {
            ?>
             <div class="cart-container">
                <div class="cart-column product-detail">
                    <img src="<?php echo $row['img']; ?>" class="cart-img"> 
                    <h3><?php echo $row['prodname']; ?></h3>
                </div>
                <div class="cart-column">
                    <p><?php echo $row['size']; ?></p>
                </div>
                <div class="cart-column">
                    <p>P<?php echo number_format($row['price'], 2); ?></p>
                </div>
                <div class="cart-column">
                    <p><?php echo $row['quantity']; ?></p>
                </div>
                <div class="cart-column">
                    <p>P<?php echo number_format($row['price'] * $row['quantity'], 2); ?></p>
                </div>
                <div class="cart-column">
                    <form action="cart_delete.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="submit" name="delete" value="DELETE"> 
                    </form>
                </div>
            </div>

            <?php
        }
    } else {
      echo '<p class="empty-cart-content">Your cart is empty.</p>';
    }
    ?>
  </div>
</body>
</html>
