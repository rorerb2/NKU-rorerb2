<?php

include('config.php');

// Include functions for application
include('functions.php');

// Get type of form either add or edit from the URL (ex. form.php?action=add) using the newly written get function
$action = $_GET['action'];

// Get the book isbn from the URL if it exists using the newly written get function
$movie_title = get('movie_title');

// Initially set $book to null;
$movie = null;


// Initially set $book_categories to an empty array;
$movie_genres = array();


// If book isbn is not empty, get book record into $book variable from the database
//     Set $book equal to the first book in $books
// 	   Set $book_categories equal to a list of categories associated to a book from the database
if(!empty($movie_title)) {
	$sql = file_get_contents('sql/getMovie.sql');
	$params = array(
		'movie_title' => $movie_title
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$movies = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	$movie = $movies[0];
	
	// Get book categories
	$sql = file_get_contents('sql/getGenre.sql');
	$params = array(
		'movie_title' => $movie_title
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$movie_genres_associative = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	foreach($movie_genres_associative as $category) {
		$movie_genres[] = $category['movie_title'];
	}
}

// Get an associative array of categories
$sql = file_get_contents('sql/getGenres.sql');
$statement = $database->prepare($sql);
$statement->execute();
$categories = $statement->fetchAll(PDO::FETCH_ASSOC); 

// If form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$genre = $_POST['genre']; 
	$movie_title = $_POST['movie_title']; 
	$movie_rating = $_POST['movie_rating']; 
	$runtime = $_POST['runtime']; 
	$release_year = $_POST['release_year']; 
	
	if($action == 'add') {
		// Insert book
		$sql = file_get_contents('sql/insertMovie.sql');
		$params = array(
			'movie_title' => $movie_title,
			'movie_rating' => $movie_rating,
			'runtime' => $runtime,
			'release_year' => $release_year
		);
	
		$statement = $database->prepare($sql);
		$statement->execute($params);
		
		$sql = file_get_contents('sql/insertMobie.sql');
		$params = array(
			'genre' => $genre,
			'movie_title' => $movie_title,
			'movie_rating' => $movie_rating,
			'runtime' => $runtime,
			'release_year' => $release_year
		);
	
		$statement = $database->prepare($sql);
		$statement->execute($params);
		
		// Set categories for book
		$sql = file_get_contents('sql/insertMobie.sql');
		$statement = $database->prepare($sql);
		
		foreach($movie_genres as $movie) {
			$params = array(
				'genre' => $genre,
				'mobieID' => $mobieID
			);
			$statement->execute($params);
		}
	}
	
	elseif ($action == 'edit') {
		$sql = file_get_contents('sql/updateMovie.sql');
        $params = array( 
			'movie_title' => $movie_title,
			'movie_rating' => $movie_rating,
			'runtime' => $runtime,
			'release_year' => $release_year
        );
        
        $statement = $database->prepare($sql);
        $statement->execute($params);
		
		$sql = file_get_contents('sql/updateMobie.sql');
        $params = array( 
			'movie_title' => $movie_title,
			'movie_rating' => $movie_rating,
			'runtime' => $runtime,
			'release_year' => $release_year
        );
        
        $statement = $database->prepare($sql);
        $statement->execute($params);
        
        //remove current category info 
        $sql = file_get_contents('sql/removeGenre.sql');
        $params = array(
            'genre' => $genre,
			'movie_title' => $movie_title
        );
        
        $statement = $database->prepare($sql);
        $statement->execute($params);
        
        //set categories for book
        $sql = file_get_contents('sql/insertMovieGenre.sql');
        $statement = $database->prepare($sql);
        
        		foreach($movie_categories as $movie) {
			$params = array(
				'genre' => $genre,
				'mobieID' => $mobieID
			);
			$statement->execute($params);
		}	
	}
	
	// Redirect to book listing page

}

// In the HTML, if an edit form:
	// Populate textboxes with current data of book selected 
	// Print the checkbox with the book's current categories already checked (selected)
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
  	<title>Manage Movie</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">

	<link rel="stylesheet" href="css/style.css">

	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  	<![endif]-->
</head>
<body>
	<div class="page">
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
		<h1>Manage Movie</h1>
		<form action="" method="POST">
			<div class="form-element">
				<label>Genre:</label>
				<p><?php foreach($categories as $category) : ?>
					<?php if(in_array($category['genre'], $movie_genres)) : ?>
						<input checked class="radio" type="checkbox" name="genre[]" value="<?php echo $category['movie_title'] ?>" /><span class="radio-label"><?php echo $category['genre'] ?></span><br />
					<?php else : ?>
						<input class="radio" type="checkbox" name="genre[]" value="<?php echo $category['movie_title'] ?>" /><span class="radio-label"><?php echo $category['genre'] ?></span><br />
					<?php endif; ?>
				<?php endforeach; ?></p>
			</div>
			<div class="form-element">
				<label>Movie Title:</label>
				<input type="text" name="movie_title" class="textbox" value="<?php echo $movie['movie_title'] ?>" />
			</div>
			<div class="form-element">
				<label>Movie Rating:</label>
				<input type="text" name="movie_rating" class="textbox" value="<?php echo $movie['movie_rating'] ?>" />
			</div>
			<div class="form-element">
				<label>Runtime:</label>
				<input type="text" name="runtime" class="textbox" value="<?php echo $movie['runtime'] ?>" />
			</div>
			<div class="form-element">
				<label>Release Year:</label>
				<input type="text" name="release-year" class="textbox" value="<?php echo $movie['release_year'] ?>" />
			</div>
			<div class="form-element">
				<input type="submit" class="button" />&nbsp;
				<input type="reset" class="button" />
			</div>
		</form>
	</div>
</body>
</html>