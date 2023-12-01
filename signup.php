

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup - Oasis Cafe</title>
  <link rel="stylesheet" href="style.css">

</head>
<body>
  <?php include "header.php"; 
  ?>

  <section class="signup">
      <div class="signup-container">
      <div class="title">
      <h2>SIGN UP</h2>
      </div>
        <form action="signup_formprocess.php" method="POST" id="signupform">
        <div class="form-field">
            <input type="text" name="firstname" id="firstname" required>
            <label for="firstname">First Name</label>
            <small>Error Message</small>           
        </div>
        <div class="form-field">
            <input type="text" name="lastname" id="lastname" required>
            <label for="lastname">Last Name</label>
            <small>Error Message</small>           
        </div>
        <div class="form-field">
            <input type="text" name="username" id="username" required>
            <label for="username">Username</label>
            <small>Error Message</small>           
        </div>
        <div class="form-field">
            <input type="email" name="email" id="email" required>
            <label for="email">Email</label>
            <small>Error Message</small>           
        </div>
        <div class="form-field">
            <input type="password" name="password" id="password" required>
            <label for="password">Password</label>
            <small>Error Message</small>           
        </div>
        <div class="form-field">
            <input type="password" name="passwordRepeat" id="passwordRepeat" required>
            <label for="password">Re-enter Password</label>
            <small>Error Message</small>           
        </div>
        <div class="signup-button">
            <input type="submit" class="signup-btn" name="signup" value="SIGN UP">
        </div> 
        
            </form>
      </div>
  </section>

  
</body>
<script src="script.js" ></script>

</html>