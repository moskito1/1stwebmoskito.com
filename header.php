<?php
include "dbconnection.php";
?>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section class="header">
    <div class="left-nav-bar">
        <a href="index.php"><img src="imgs/logo.png" alt=""></a>
    </div>
    <div class="middle-nav-bar">
        <a href="index.php">HOME</a>
        <a href="menu.php">MENU</a>
        <a href="aboutus.php">ABOUT US</a>
    </div> 
    <div class="right-nav-bar">
        <a href="cart.php"><i class="fa fa-shopping-cart"></i></a>
        <?php if (isset($_SESSION["username"])) {
            include "get_user_info.php";
            echo '<img src="' . $userProfilePicture . '" alt="User Profile Picture" class="userpicture">';
        ?>

        <div class="user-profile-dropdown">
            <div class="user-profile">
                <div class="user-info">
                    <?php echo '<img src="' . $userProfilePicture . '" alt="User Profile Picture" class="dropdown-userpicture">'; 
                        echo '<h4>'. $userFirstName . ' ' . $userLastName .'</h4>';
                    ?>
                </div>
                <div class="user-settings">
                  <div class="user-settings-items">
                    <div class="user-settings-icon">
                      <i class="fa fa-user"></i>
                    </div>
                    <div class="user-settings-title">
                    <a href="">Profile Info</a>
                    </div>
                  </div>
                  <div class="user-settings-items">
                    <div class="user-settings-icon">
                      <i class="fa fa-sign-out"></i>
                    </div>
                    <div class="user-settings-title">
                      <a href="index.php?logout=1">Logout</a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <?php } else { ?>
            <a href="login.php"><i id="user-icon" class="fa fa-solid fa-user"></i></a>
        <?php } ?>
    </div>
</section>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let userProfileToggle = document.querySelector(".userpicture");
        let userProfileDropdown = document.querySelector(".user-profile-dropdown");

        if (userProfileToggle && userProfileDropdown) {
            userProfileToggle.addEventListener("click", () => {
                userProfileDropdown.classList.toggle("active");
            });

            window.addEventListener("click", (event) => {
                if (!event.target.matches(".userpicture")) {
                    userProfileDropdown.classList.remove("active");
                }
            });
        }
    });
</script>

</html>