<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en">

<head>

    <?php include 'head.php'; ?>

    <link rel="stylesheet" href="contact.css" />

    <?php ensure_user_is_authenticated(); ?>

</head>

<body>

    <section>
        <div class="contact-container">
            <div class="form-container">
                <h3>Contact Us</h3>
                <form action="" class="contact-form">
                    <?php
                    if (!isset($_SESSION['customer_full_name']))
                        echo '<input type="text" placeholder="Your Name" required>';
                    else
                        echo '<input type="text" placeholder="Your Name" value="' . $_SESSION['customer_full_name'] . '"readonly>';
                    ?>
                    <input type="email" value="<?php echo $_SESSION['customer_email']; ?>" readonly>
                    <textarea name="" id="" cols="30" rows="10" placeholder="Write Message Here..." required></textarea>
                    <input type="submit" value="Send" class="buttons send-button">
                    <a href="index.php" class="buttons send-button">Back</a>
                </form>
            </div>
        </div>
    </section>

</body>

</html>