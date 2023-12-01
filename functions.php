<?php

  function emptyInputSignup($firstName, $lastName, $username, $email, $password, $passwordRepeat){
    $result;
    if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($passwordRepeat)){
      $result = true;
    } else {
      $result = false;
    }
    return $result;
  }
  function invalidName($firstName, $lastName) {
    $result;
    if (!preg_match("/^[a-zA-Z]*$/", $firstName, $lastName)){
      $result = true;
    } else {
      $result = false;
    }
    return $result;
  }

  function invalidUsername($username) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
      $result = true;
    } else {
      $result = false;
    }
    return $result;
  }

  function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $result = true;
    } else {
      $result = false;
    }
    return $result;
  }

  function passwordMatch($password, $passwordRepeat) {
    $result;
    if ($password !== $passwordRepeat){
      $result = true;
    } else {
      $result = false;
    }
    return $result;
  }


  function usernameExists($conn, $username, $email) {
    $sql = "SELECT * FROM userInfo WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
      header("location: signup.php?error=connectionfailed");
      exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;
    } 
    else {
      $result = false;
      return $result;
    }

    mysqli_stmt_close($stmt);
  }

  function createUser($conn,$firstName, $lastName, $username, $email, $password){
    $sql = "INSERT INTO userInfo (username, password, firstname, lastname, email) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
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

  function emptyInputLogin($username, $password){
    $result;
    if(empty($username) || empty($password)){
      $result = true;
    }
    else {
      $result = false;
    }
    return $result;
  }

  function loginUser($conn, $username, $password){
    $userExists = usernameExists($conn, $username, $username);

    if ($userExists === false){
      header("location: login.php?error=wronglogin");
      exit();
    }
    
    $password_hashed = $userExists["password"];
    $checkPassword = password_verify($password, $password_hashed);

    if ($checkPassword === false){
      header("location: login.php?error=wronglogin");
      exit();
    }
    else if($checkPassword === true){
      session_start();
      $_SESSION["id"] = $userExists["userid"];
      $_SESSION["username"] = $userExists["username"];
      header("location: index.php");
      exit();
    }
  }


