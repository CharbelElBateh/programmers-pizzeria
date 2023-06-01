<!-- Welcome to Programmer's pizzeria -->

<!-- The project is based on the builder design pattern -->

<!-- Allows Global Variables to be accessed -->
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'head.php'; ?>

  <link rel="stylesheet" href="styles.css" />

  <?php ensure_user_is_authenticated(); ?>

  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>
  <?php include 'header.php'; ?>

  <script type="text/javascript" src="main.js"></script>

  <section class="home" id="home">
    <div class="home-icon">
      <img src="images/pizza-icon.png" alt="pizza">
    </div>
    <div class="home-text">
      <h1>Create <br> Your own <br> Pizza</h1>
      <a href="sauce.php" class="btn">Create</a>
    </div>
  </section>

  <svg id="visual" viewBox="0 0 592 300" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1">
    <path d="M317 300L328.5 291.7C340 283.3 363 266.7 374.3 250C385.7 233.3 385.3 216.7 382.3 200C379.3 183.3 373.7 166.7 363 150C352.3 133.3 336.7 116.7 344.8 100C353 83.3 385 66.7 402 50C419 33.3 421 16.7 422 8.3L423 0L592 0L592 8.3C592 16.7 592 33.3 592 50C592 66.7 592 83.3 592 100C592 116.7 592 133.3 592 150C592 166.7 592 183.3 592 200C592 216.7 592 233.3 592 250C592 266.7 592 283.3 592 291.7L592 300Z" fill="#f12700"></path>
    <path d="M440 300L437.5 291.7C435 283.3 430 266.7 424.5 250C419 233.3 413 216.7 423.3 200C433.7 183.3 460.3 166.7 456.3 150C452.3 133.3 417.7 116.7 412.3 100C407 83.3 431 66.7 431.2 50C431.3 33.3 407.7 16.7 395.8 8.3L384 0L592 0L592 8.3C592 16.7 592 33.3 592 50C592 66.7 592 83.3 592 100C592 116.7 592 133.3 592 150C592 166.7 592 183.3 592 200C592 216.7 592 233.3 592 250C592 266.7 592 283.3 592 291.7L592 300Z" fill="#d32301"></path>
    <path d="M531 300L534.3 291.7C537.7 283.3 544.3 266.7 543.5 250C542.7 233.3 534.3 216.7 523.3 200C512.3 183.3 498.7 166.7 490.7 150C482.7 133.3 480.3 116.7 477 100C473.7 83.3 469.3 66.7 469.7 50C470 33.3 475 16.7 477.5 8.3L480 0L592 0L592 8.3C592 16.7 592 33.3 592 50C592 66.7 592 83.3 592 100C592 116.7 592 133.3 592 150C592 166.7 592 183.3 592 200C592 216.7 592 233.3 592 250C592 266.7 592 283.3 592 291.7L592 300Z" fill="#b51e01"></path>
  </svg>

  <section class="menu" id="menu">
    <div class="heading">
      <span>Chef's Specialty</span>
      <h2>Fresh taste and great price</h2>
    </div>

    <div class="menu-container">
      <div class="box">
        <form method="post">
          <div class="box1">
            <div class="box-img">
              <!-- Pepperoni Pizza -->
              <img src="images/pepperoni-pizza.png" alt="" class="product-img">
              <h2 class="product-title">Pepperoni Pizza</h2>
              <h3>Large, Classic Crust, Mozzarella, <br> Tomato Sauce, and Double <br> Pepperoni</h3>
              <span class="price">$20.00</span>
              <p></p>
              <input type="submit" class="cart-btn" value="Buy Now" name="pepperoni">

            </div>

            <div class="box-img">
              <!-- BBQ Pizza -->
              <img src="images/bbq-pizza.png" alt="" class="product-img">
              <h2 class="product-title">BBQ Pizza</h2>
              <h3>Large, Classic Crust, Mozzarella, <br> BBQ Sauce, Tomatoes, Mushrooms, <br> and Olives</h3>
              <span class="price">$17.00</span>
              <p></p>
              <input type="submit" class="cart-btn" value="Buy Now" name="bbq">


            </div>
          </div>
          <div class="box2">
            <div class="box-img">
              <!-- Pesto Pizza -->
              <img src="images/pesto-veggie-pizza.png" alt="" class="product-img">
              <h2 class="product-title">Pesto Veggie Pizza</h2>
              <h3>Large, Classic Crust, Mozzarella, <br> Basil Pesto Sauce, Broccoli, <br> Olives, Onions, Tomatoes, <br> and Peppers</h3>
              <span class="price">$18.00</span>
              <p></p>
              <input type="submit" class="cart-btn" value="Buy Now" name="pesto">


            </div>

            <div class="box-img">
              <!-- Mexican Pizza -->
              <img src="images/mexican-pizza.png" alt="" class="product-img">
              <h2 class="product-title">Mexican Pizza</h2>
              <h3>Large, Classic Crust, Mozzarella, <br> Tomato Sauce, Pepperoni, <br> Jalapenos, Onions, Peppers, <br> and Mushrooms</h3>
              <span class="price">$22.00</span>
              <p></p>
              <input type="submit" class="cart-btn" value="Buy Now" name="mexican">

            </div>
          </div>
        </form>
  </section>

  <section class="services" id="services">
    <div class="heading">
      <span>Services</span>
      <h2>We provide best quality food</h2>
    </div>

    <div class="service-container">
      <div class="s-box">
        <img src="images/s1.png" alt="s1">
        <h3>Order</h3>
        <p>Quick and easy ordering experience</p>
      </div>

      <div class="s-box">
        <img src="images/s2.png" alt="s2">
        <h3>Shipping</h3>
        <p>Receive your order in under 30 minutes!</p>
      </div>

      <div class="s-box">
        <img src="images/s3.png" alt="s3">
        <h3>Delivered</h3>
        <p>Enjoy your meal :)</p>
      </div>
    </div>
  </section>

  <section class="cta">
    <h2>Any concerns or bad <br> experience?</h2>
    <a href="contact.php" class="btn">Let's talk</a>
  </section>

  <section id="contact">
    <div class="footer">
      <div class="main">
        <div class="col">
          <h2>Programmer's Pizzeria</h2>
          <p>We provide high quality food <br> and the tastiest pizzas <br> in town.</p>
        </div>

        <div class="col">
          <h4>Menu Links</h4>
          <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="login-signup.php?logout">Log-out</a></li>
          </ul>
        </div>

        <div class="col">
          <h4>Follow Us</h4>
          <div class="social">
            <a href="#"><i class='bx bxl-facebook'></i></a>
            <a href="#"><i class='bx bxl-instagram'></i></a>
            <a href="#"><i class='bx bxl-twitter'></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script type="text/javascript" src="behavior.js"></script>

</body>

</html>

<?php

//The design pattern will create the pizza using proper pizza builder and initiated by the pizza builder director
//Save the pizza & the order to the database
//Redirect to the thank you page

if (isset($_POST['pepperoni'])) {
  $pep = (new PizzaBuilderDirector())->build(new PepperoniPizzaBuilder(new Pizza()), "Large", 'Classic');
  save_preset_order($pep);
  echo "<script>window.location.href='thankyou.php';</script>";
}

if (isset($_POST['mexican'])) {
  $mexican = (new PizzaBuilderDirector())->build(new MexicanPizzaBuilder(new Pizza()), "Large", 'Classic');
  save_preset_order($mexican);
  echo "<script>window.location.href='thankyou.php';</script>";
}

if (isset($_POST['bbq'])) {
  $bbq = (new PizzaBuilderDirector())->build(new BBQPizzaBuilder(new Pizza()), "Large", 'Classic');
  save_preset_order($bbq);
  echo "<script>window.location.href='thankyou.php';</script>";
}

if (isset($_POST['pesto'])) {
  $pesto = (new PizzaBuilderDirector())->build(new PestoVeggiePizzaBuilder(new Pizza()), 'Large', 'Classic');
  save_preset_order($pesto);
  echo "<script>window.location.href='thankyou.php';</script>";
}
