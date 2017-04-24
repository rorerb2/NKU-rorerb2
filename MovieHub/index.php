<?php

// Create and include a configuration file with the database connection
include('config.php');

// Include functions for application
include('functions.php');

// Get search term from URL using the get function

// Get a list of books using the searchBooks function
// Print the results of search results
// Add a link printed for each book to book.php with an passing the isbn
// Add a link printed for each book to form.php with an action of edit and passing the isbn
$sql = file_get_contents('sql/getFavorites.sql');
$params = array(
	'movie_title' => $movie_title,
	'actor_name' => $actor_name
);
$statement = $database->prepare($sql);
$statement->execute($params);
$favorites = $statement->fetchAll(PDO::FETCH_ASSOC);


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
	<a href="logout.php">Logout</a>
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
		<div id="header">
		<h1>Welcome to the MovieHub</h1>
		</div>
		
<?php if (isset($_SESSION["userid"])) {?>
		<div id="header2">
Favorites:
<?php echo $favorites['actor_name'] ?>
<?php echo $favorites['movie_title'] ?>

</div>
		<?php } ?>
<div id="footer" >
<img src="images/reel.png" height='500' width='500'  /></div>

</body>
</html>