<?php
session_start();
include "dbconnection.php";

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM userinfo WHERE username = ? OR email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $username, $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) === 1) {
            $data = mysqli_fetch_assoc($result);

            if (password_verify($password, $data['password'])) {
                $_SESSION['username'] = $data['username'];
                header("location: index.php");
                exit();
    

            } else {
                $_SESSION["errormsg"] = 'Username or Password is incorrect!';
                header("location: login.php");
                exit();
            }
        } else {
            $_SESSION["errormsg"] = 'Username or Email not found!';
            header("location: login.php");
            exit();
        }
        mysqli_stmt_close($stmt);
    } else {
        $_SESSION["errormsg"] = 'Database error: ' . mysqli_error($conn);
        header("location: login.php");
        exit();
    }
} else {
    header("location: index.php");
    exit();
}
?>
