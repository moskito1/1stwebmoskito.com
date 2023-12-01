<?php
include ('dbconnection.php');
if (isset($_POST["signup"])) {

    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];

    $sql = "INSERT INTO userInfo (firstname, lastname, username, email, password, userimg) VALUES (?, ?, ?, ?, ?, 'imgs/default-user-profile/default-profile.jpg');";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: signup.php?error=connectionfailed");
        exit();
    }

    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $firstName, $lastName, $username, $email, $password_hashed);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: login.php");
    exit();
}
