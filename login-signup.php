<?php
session_start();

require("./app/app.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include 'head.php'; ?>

    <title>Login/Signup</title>

    <link rel="stylesheet" href="login-signup.css" />

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

</head>

<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form method="post">
                <a href="index.php" class="back"><i class='bx bx-left-arrow-alt'></i>Back</a>
                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="text" name="signup_customer_username" placeholder="User name" required="" maxlength="20">
                <input type="email" name="signup_customer_email" placeholder="Email" required="">
                <input type="password" name="signup_customer_password" placeholder="Password" required="">
                <input type="password" name="signup_customer_confirm_password" placeholder="Confirm Password" required="">
                <input type="submit" name="signup_submit" value="Sign Up" class="button">
            </form>
        </div>

        <div class="login">
            <form method="post">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="login_customer_email" placeholder="Email" required="">
                <input type="password" name="login_customer_password" placeholder="Password" required="">
                <input type="submit" name="login_submit" value="Log In" class="button">
            </form>
        </div>
    </div>

</body>

</html>

<?php
if (isset($_POST['signup_submit'])) {
    sign_up();
}

if (isset($_POST['login_submit'])) {
    log_in();
}
