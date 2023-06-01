<?php
require_once('app.php');

//Database connection
$connection = new mysqli('localhost', 'root', '', 'database');

//Function that redirects the user to the provided url while stopping all processes
function redirect($url)
{
    header("Location: $url");
    die();
}

//Function that checks if the user is logged in
function is_user_authenticated()
{
    return isset($_SESSION['customer_id']);
}

//Function that ensures that the user is logged in
function ensure_user_is_authenticated()
{
    if (!is_user_authenticated()) redirect('./login-signup.php');
}

//Function that executes the provided sql statement avoiding multiple calls to $connection
function query($statement)
{
    global $connection;
    return $connection->query($statement);
}

//Function that returns all the SQL table with the provided title
function getAllTbl($tbl)
{
    if (!doesTableExist($tbl)) return "No such Table";

    return query("SELECT * FROM $tbl");
}

//Function that return user data from their email address
function getRowByEmail($email)
{
    return query("SELECT * FROM tbl_customer WHERE customer_email = '$email' LIMIT 1");
}

//Function that returns the SQL table's presence
function doesTableExist($tbl)
{
    return empty($tbl) or query("DESCRIBE $tbl");
}

//Function that checks if the username is already taken
function doesUserAlreadyExist($username)
{
    $result = query("SELECT * FROM tbl_customer WHERE customer_username = '$username' LIMIT 1");

    $result = $result->fetch_assoc();

    return is_array($result);
}

//Function that checks if the email address is already taken
function isEmailAlreadyTaken($email)
{
    $result = query("SELECT * FROM tbl_customer WHERE customer_email = '$email' LIMIT 1");

    $result = $result->fetch_assoc();

    return is_array($result);
}


function sign_up()
{
    $errors = [];

    //Getting user input from form
    $user_name = $_POST['signup_customer_username'];
    $email = $_POST['signup_customer_email'];
    $password = $_POST['signup_customer_password'];
    $confirm_password = $_POST['signup_customer_confirm_password'];

    //If any errors are encountered they are pushed onto the array of errors to be displayed on submission

    //Is the username valid?
    if (empty($user_name) || is_numeric($user_name)) {
        array_push($errors, 'Please enter a valid user name');
    }
    //Is the username already used
    if (doesUserAlreadyExist($user_name)) {
        array_push($errors, 'Username already exists');
    }
    //Is the email address valid
    if (empty($email)  || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, 'Please enter a valid email');
    }
    //Is the email address already taken
    if (isEmailAlreadyTaken($email)) {
        array_push($errors, 'Email already taken');
    }

    //Is the confirmation of the password equal to the password
    if ($password != $confirm_password) {
        array_push($errors, 'Passwords do not match');
    }

    //If there are any errors
    if (!empty($errors)) {
        //Alert the user using javascript
        echo "<script> alert('" .
            implode('\\n', $errors) .
            "');</script>";
    } else {
        //Add user information to the database
        add_user_to_database($user_name, $email, $password);
        //start session
        initialize_session($email);
    }

    //Clearing up post variables
    unset($_POST);
}

//Function that adds user information to the database
function add_user_to_database($user_name, $email, $password)
{
    $password = password_hash($password, PASSWORD_DEFAULT);
    query("INSERT INTO tbl_customer (customer_email, customer_username, customer_password) VALUES ('$email', '$user_name', '$password')");
}

//Function that check if the user has an account
function check_user($email, $password)
{

    if ($email = getRowByEmail($email)) {
        $mail = $email->fetch_assoc();
        return password_verify($password, $mail["customer_password"]);
    }

    return false;
}

function log_in()
{

    $email = $_POST['login_customer_email'];
    $password = $_POST['login_customer_password'];

    //if the user does not exist
    if (!check_user($email, $password)) {
        //throw an error
        echo "<script> alert('The credentials you entered are not valid');</script>";
    } else {
        //start session
        initialize_session($email);
    }
}

//Changes provided credentials into session variables that can be used across all files
function initialize_session($email)
{

    $customer = getRowByEmail($email);

    $attribute = $customer->fetch_assoc();

    foreach ($attribute as $key => $value) {
        $_SESSION[$key] = $value;
    }

    redirect("index.php");
}

//Function that saves sauces in an array to be used by the design pattern
function save_sauce()
{
    $sauces = [];
    $sauces_tbl = getAllTbl('tbl_sauce');

    while ($sauce = $sauces_tbl->fetch_assoc())
        if (isset($_POST[$sauce["sauce_name"]])) {
            array_push($sauces, $sauce["sauce_name"]);
        }

    $_SESSION['sauces'] = $sauces;
}

//Function that saves toppings in an array to be used by the design pattern
function save_topping()
{
    $toppings = [];
    $toppings_tbl = getAllTbl('tbl_topping');

    while ($topping = $toppings_tbl->fetch_assoc())
        if (isset($_POST[$topping["topping_name"]])) {
            array_push($toppings, $topping["topping_name"]);
        }


    $_SESSION['toppings'] = $toppings;
}

//Function that saves desired crust thickness and size of the pizza to be used by the design pattern
function save_crust_and_size()
{
    $_SESSION['size'] = $_POST['size'];
    $_SESSION['crust'] = $_POST['crust'];
}


// ----------------------------------------------------------------

// ---------------Builder Design Pattern Functions ----------------

//Function that saves the order to the database as a pizza and as an order
function save_order($sauces, $toppings, $size, $crust)
{
    //Builder design pattern will build the pizza
    $pizza = (new PizzaBuilderDirector())->customBuild(new CustomPizzaBuilder(new Pizza()), $size, $crust, $toppings, $sauces);

    //get pizza id after storing it in the database
    $id = add_pizza_to_db($pizza);

    //Process the order
    add_order_to_db($id);
}

//Function that saves the order to the database as a preset pizza and as an order
//Since the pizza was already creates by the design pattern in index.php we can process it directly
function save_preset_order($pizza)
{

    //get pizza id after storing it in the database
    $id = add_preset_pizza_to_db($pizza);

    //Process the order
    add_order_to_db($id);
}

//Function that saves the preset pizza to the database
function add_preset_pizza_to_db($pizza)
{
    //Get the size id
    $size_id = get_size_id($pizza);
    //Get the crust id
    $crust_id = get_crust_id($pizza);

    //Turn sauces and toppings into strings for storage
    $sauces = implode(" ", $pizza->sauces);
    $toppings = implode(" ", $pizza->toppings);

    //Add the pizza to the database
    query("INSERT INTO `tbl_pizza` (`pizza_id`, `size_id`, `crust_id`, `sauce_name`, `topping_name`) VALUES (NULL, '$size_id', '$crust_id', '$sauces', '$toppings')");

    //Return the id
    return get_id($sauces, $toppings, $crust_id, $size_id);
}

function get_size_id($pizza)
{
    return query("SELECT size_id FROM tbl_size WHERE size_name = '" . $pizza->size . "' LIMIT 1")->fetch_assoc()['size_id'];
}

//Function that return the crust id based on the provided pizza
function get_crust_id($pizza)
{
    return query("SELECT crust_id FROM tbl_crust WHERE crust_name = '" . $pizza->crust . "' LIMIT 1")->fetch_assoc()['crust_id'];
}

//Function that saves custom pizza to database
function add_pizza_to_db($pizza)
{
    //Get the size id
    $size_id = get_size_id($pizza);
    //Get the crust id
    $crust_id = get_crust_id($pizza);

    //Turn sauces and toppings into strings for storage
    $sauces = implode(" ", $pizza->sauces);
    $toppings = implode(" ", $pizza->toppings);

    //Add custom pizza to the database
    query("INSERT INTO `tbl_pizza` (`pizza_id`, `size_id`, `crust_id`, `sauce_name`, `topping_name`) VALUES (NULL, '$size_id', '$crust_id', '$sauces', '$toppings')");

    //Return the id
    return get_id($sauces, $toppings, $crust_id, $size_id);
}

//Function that return the pizza id based on its information for order processing
function get_id($sauces, $toppings, $crust_id, $size_id)
{
    return query("SELECT * FROM tbl_pizza WHERE sauce_name = '$sauces' AND topping_name = '$toppings' AND size_id = '$size_id' AND crust_id = '$crust_id' LIMIT 1")->fetch_assoc()['pizza_id'];
}

//Function that saves the order by id, customer and pizza
function add_order_to_db($id)
{
    query("INSERT INTO tbl_order (order_id, customer_id, pizza_id) VALUES (NULL , '" . $_SESSION['customer_id'] . "', '$id')");
}
