<?php
session_start();

if (isset($_GET["logout"])) {

    session_unset();

    session_destroy();

    header("Location: index.php");
    exit;
}
?>
  
  <!DOCTYPE html>

  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oasis Cafe</title>
  </head>
  <?php include "header.php"; ?>

    <section class="body">
      <div class="info-container">
      <div class="large-info">
        <p>FRESHEN UP AND SIP A FRESHLY BREWED COFFEE</p>
      </div>
      <div class="sub-info">
        <p>Amidst the hustle and bustle of life's demands, take a moment to indulge
        in the simple pleasure of freshening up of your spirit and invigorating your 
        senses with a cup of meticulously brewed aromatic coffee.</p>
      </div>
      <div class="button-div">
        <a href="menu.php"><button>ORDER HERE</button></a>
      </div>
      </div>
      
    </section>
  </body>

  </html>