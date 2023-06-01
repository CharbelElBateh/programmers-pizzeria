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
        <div class="title">
            Let's pick size and crust!
        </div>

        <div class="pizza-image">
            <img src="images/custom-pizza.png" alt="Pizza" width="300">
        </div>

        <div class="container contains">
            <form action="" method="post">
                <div class="size">
                    <div class="title">
                        Select a size:
                    </div>

                    <div class="dropdown_size">

                        <input type="text" class="textBox" placeholder="Size" id="size" name="size" readonly>
                        <div class="option">
                            <?php
                            $size_tbl = getAllTbl('tbl_size');

                            while ($size = $size_tbl->fetch_assoc()) {
                                echo '<div onclick="show(\'' . $size["size_name"] . '\')">' . $size["size_name"] . '</div>';
                            }
                            ?>
                        </div>

                    </div>
                </div>

                <div class="crust">
                    <div class="title">
                        Select a crust:
                    </div>

                    <div class="dropdown_crust">

                        <input type="text" class="textBox2" placeholder="Crust" id="crust" name="crust" readonly>
                        <div class="option">
                            <?php
                            $crust_tbl = getAllTbl('tbl_crust');

                            while ($crust = $crust_tbl->fetch_assoc()) {
                                echo '<div onclick="show2(\'' . $crust["crust_name"] . '\')">' . $crust["crust_name"] . '</div>';
                            }
                            ?>
                        </div>

                    </div>
                </div>

                <script>
                    function show(anything) {
                        document.querySelector('.textBox').value = anything;
                    }

                    function show2(anything) {
                        document.querySelector('.textBox2').value = anything;
                    }

                    let dropdown = document.querySelector('.dropdown_size');
                    dropdown.onclick = function() {
                        dropdown.classList.toggle('active');
                    }

                    let dropdown2 = document.querySelector('.dropdown_crust');
                    dropdown2.onclick = function() {
                        dropdown2.classList.toggle('active');
                    }
                </script>

                <div class="buttons">
                    <input type="submit" value="Back" class="submit-btn btn" name="crust_back">
                    <input type="submit" value="Buy Now" class="submit-btn btn" name="crust_buy">
                </div>
            </form>
        </div>

        <script type="text/javascript" src="customize.js"></script>
        <script type="text/javascript" src="behavior.js"></script>

    </div>

</body>

</html>

<?php

if (isset($_POST['crust_back'])) {
    save_crust_and_size();
    echo "<script>window.location.href='toppings.php';</script>";
}
if (isset($_POST['crust_buy'])) {
    save_crust_and_size();
    save_order($_SESSION['sauces'], $_SESSION['toppings'], $_SESSION['size'], $_SESSION['crust']);
    unset($_POST);
    echo "<script>window.location.href='thankyou.php';</script>";
}
