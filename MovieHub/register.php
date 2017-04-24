<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Get username and password from the form as variables
	$username = $_POST['username'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$birthdate = $_POST['birthdate'];
	
	// Query records that have usernames and passwords that match those in the customers table
	
	$sql = file_get_contents('sql/insertUsers.sql');
	$params = array(
		'username' => $username,
		'firstname' => $firstname,
		'lastname' => $lastname,
		'password' => $password,
		'email' => $email,
		'birthdate' => $birthdate
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$users = $statement->fetchAll(PDO::FETCH_ASSOC);

	
	}


		

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
  	<title>Create an Account</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">

	<link rel="stylesheet" href="css/style.css">

	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  	<![endif]-->
	<div class="nav">
  <a href="index.php">Home</a>
  <div class="dropdown">
    <button class="dropbtn">Login/Register</button>
    <div class="dropdown-content">
      <a href="login.php">Login</a>
      <a href="register.php">Create Account</a>
	  </div>
	  </div>
  <div class="dropdown">
    <button class="dropbtn">Movies</button>
    <div class="dropdown-content">
      <a href="#">By Genre</a>
      <a href="#">By Title</a>
      <a href="date.php">By Date</a>
	  </div>
	  </div>
	  <div class="dropdown">
	<button class="dropbtn">Actors</button>
    <div class="dropdown-content">
      <a href="actors.php">Name</a>
	  </div>
  </div> 
  <form method="GET" style="padding-top:11px">
			<input type="text" name="search-term" placeholder="Search..." />
			<input type="submit" />
		</form>
</div>
</head>
<body>

	<div class ="body">
		<h1>Create an Account</h1>
		<form method="POST">
			<p>
			<input type="text" name="username" placeholder="Username" /></p>
			<p><input type="firstname" name="firstname" placeholder="First Name" /></p>
			<p><input type="lastname" name="lastname" placeholder="Last Name" /></p>
			<p><input type="password" name="password" placeholder="Password" /></p>
			<p><input type="email" name="email" placeholder="Email" /></p>
			<p><input type="birthdate" name="birthdate" placeholder="Birthday(yyyy-mm-dd)" /></p>
			<input type="submit" name ="register" value="Register" />
	</div>
	</div>
</body>
</html>