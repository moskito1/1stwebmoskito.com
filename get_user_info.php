  <?php

  if (isset($_SESSION["username"])) {
    $username = $_SESSION['username'];
    $sql = "SELECT userimg, firstname, lastname FROM userInfo WHERE username = ?";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) { 
            $userProfilePicture = $row['userimg'];
            $userFirstName = $row['firstname'];
            $userLastName = $row['lastname'];
            
        }
        
        mysqli_stmt_close($stmt);
    }
  }?>