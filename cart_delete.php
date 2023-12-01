<?php
session_start();
include('dbconnection.php');

if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit();
}

if (isset($_POST['delete'])) {
  $id = $_POST['id'];
  $username = $_SESSION['username'];

  $query = "DELETE FROM cart WHERE id = ? AND username = ?";
  $stmt = mysqli_prepare($conn, $query);

  if ($stmt) {
    mysqli_stmt_bind_param($stmt, 'is', $id, $username);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
      // Item deleted successfully, you can redirect back to the cart page
      header('Location: cart.php');
      exit();
    } else {
      // Error occurred while deleting the item
      echo "Error: Unable to delete the item from the cart.";
    }
  } else {
    // Error occurred while preparing the statement
    echo "Error: Unable to prepare the delete statement.";
  }

  mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
