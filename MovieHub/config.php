<?php

// Connecting to the MySQL database
$user = 'rorerb2';
$password = 'P9anMYnb';


$database = new PDO('mysql:host=csweb.hh.nku.edu;dbname=db_spring17_rorerb2', $user, $password);

// Start the session
function my_autoloader($class){
	include 'classes/class.' . $class . '.php';
}

	spl_autoload_register('my_autoloader');

session_start();	
$current_url = basename($_SERVER['REQUEST_URI']);


if (isset($_SESSION["userid"])) {
	$user = new Customer($_SESSION["userid"], $database);
}

if (isset($_SESSION['cart'])){
	$cart = $_SESSION['cart'];
}
elseif(!isset($_SESSION['cart'])){
	$_SESSION['cart'] = new ShoppingCart();
}
?>