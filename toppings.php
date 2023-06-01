<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'head.php'; ?>

  <link rel="stylesheet" href="customize.css" />

  <?php ensure_user_is_authenticated(); ?>

  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

</head>

<body>

  <?php include 'header.php'; ?>

  <script type="text/javascript" src="main.js"></script>

  <div class="wrapper">
    <form action="" method="post">
      <div class="title">
        Let's pick toppings!
      </div>

      <div class="pizza-image">
        <img src="images/custom-pizza.png" alt="Pizza" width="300">
      </div>

      <div class="container" id="container">
        <?php include './views/topping-option.views.php'; ?>

        <div class="print-values">
          <p id="valueList"></p>
        </div>

        <div class="buttons">
          <input type="submit" class="submit-btn" name="save_topping_back" value="Back">
          <input type="submit" value="Next" class="submit-btn" name="save_topping_next">
        </div>
    </form>
  </div>

  <script type="text/javascript" src="customize.js"></script>
  <script type="text/javascript" src="behavior.js"></script>

</body>

</html>

<?php
if (isset($_POST['save_topping_back'])) {
  save_topping();
  echo "<script>window.location.href='sauce.php';</script>";
}
if (isset($_POST['save_topping_next'])) {
  save_topping();
  echo "<script>window.location.href='crust.php';</script>";
}
