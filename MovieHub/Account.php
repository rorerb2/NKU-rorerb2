<?php

// Create and include a configuration file with the database connection
include('config.php');

// Include functions for application
include('functions.php');

$username = null;
$userid = null;

// Get search term from URL using the get function

// Get a list of books using the searchBooks function
// Print the results of search results
// Add a link printed for each book to book.php with an passing the isbn
// Add a link printed for each book to form.php with an action of edit and passing the isbn
$sql = file_get_contents('sql/updateUsername.sql');
$params = array(
	'userid' => $userid
);
$statement = $database->prepare($sql);
$statement->execute($params);

$sql = file_get_contents('sql/updatePassword.sql');
$params = array(
	'username' => $username
);
$statement = $database->prepare($sql);
$statement->execute($params);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$username = $_POST['username'];
        $password = $_POST['password'];
        $newpassword = $_POST['newpassword'];
        $confirmnewpassword = $_POST['confirmnewpassword'];
        
        if(!$result)
        {
        echo "The username you entered does not exist";
        }
        else if($password!= mysql_result($result, 0))
        {
        echo "You entered an incorrect password";
        }
        if($newpassword=$confirmnewpassword)
        $sql=mysql_query("UPDATE users SET password='$newpassword' where login='$username'");
        if($sql)
        {
        echo "Congratulations You have successfully changed your password";
        }
       else
        {
       echo "The new password and confirm new password fields must be the same";
       }
}

?>

<html lang = "en">
<html lang="en">
<head>
	<meta charset="utf-8">
	
  	<title>Movie Hub</title>
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
      <a href="genre.php">By Genre</a>
      <a href="title.php">By Title</a>

		<a href="date.php">By Date</a>

	  </div>
	  </div>
	  <div class="dropdown">
	<button class="dropbtn">Actors</button>
    <div class="dropdown-content">
      <a href="actors.php">Name</a>
	  </div>
	</div> 
	<?php if (isset($_SESSION["userid"])) {?>
	<div class="dropdown2" style="float:right;">
	<button class="dropbtn2"> <?php echo $user->getName() ?> </button>
	<div class="dropdown-content2">
	<a href="Account.php">My Account</a>
	<a href="Favorites.php">Favorites</a>
	</div>
	</div>
	<?php } ?>
	<form method="GET" style="padding-top:11px">
			<input type="text" name="search-term" placeholder="Search..." />
			<input type="submit" />
		</form>

	</div>
</div>
</head>
<body>

<div id="header"> Change Username </div>
   <form method="POST" action="passch1.php">
    <table>
    <tr>
    <td>Enter your username:</td>
    <td><input type="username" size="10" name="username"></td>
    </tr>
  <tr>
    <td>Enter your password:</td>
    <td><input type="password" size="10" name="password"></td>
    </tr>
    <tr>
   <td>Re-enter your password:</td>
   <td><input type="password" size="10" name="confirmnewpassword"></td>
    </tr>
    </table>
    <p><input type="submit" value="Change Username">
    </form>


<div id="header"> Change Password </div>
   <form method="POST" action="passch1.php">
    <table>
    <tr>
    <td>Enter your existing password:</td>
    <td><input type="password" size="10" name="password"></td>
    </tr>
  <tr>
    <td>Enter your new password:</td>
    <td><input type="password" size="10" name="newpassword"></td>
    </tr>
    <tr>
   <td>Re-enter your new password:</td>
   <td><input type="password" size="10" name="confirmnewpassword"></td>
    </tr>
    </table>
    <p><input type="submit" value="Update Password">
    </form>
   <p><a href="index.php">Home</a>
   <p><a href="logout.php">Logout</a>
		
		

<div id="footer" >
<img src="images/reel.png" height='500' width='500'  /></div>

</body>
</html>