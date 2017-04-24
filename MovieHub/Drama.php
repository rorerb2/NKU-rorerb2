<?php
include('config.php');


$genre = 'drama';

$sql = file_get_contents('sql/orderByGenre.sql');
$params = array(
	'genre' => $genre
);
$statement = $database->prepare($sql);
$statement->execute($params);
$movies = $statement->fetchAll(PDO::FETCH_ASSOC);

$movie = $movies[0];

?>


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

	</head>
<body>

<div align=center class=container style='margin-bottom:10px; padding-top:10px;'><span class=lc>Filter: <a href='?' onClick=""></a><span id='list_menu'>
 <a href='action.php' >Action</a>  <a href='Adventure.php' >Adventure</a>  <a href='Biography.php'>Biography</a>  <a href='Comedy.php'>Comedy</a>  
 <a href='Crime.php'>Crime</a>   <a href='Documentary.php'>Documentary</a>  <a href='Drama.php'>Drama</a>  <a href='Family.php'>Family</a>  
 <a href='Fantasy.php'>Fantasy</a>  <a href='History.php'>History</a>  <a href='Horror.php'>Horror</a> <a href='Musical.php'>Musical</a>  
 <a href='Mystery.php'>Mystery</a>   <a href='Romance.php'>Romance</a>  <a href='Sci Fi.php'>Sci Fi</a>  <a href='Short.php'>Short</a> 
 <a href='Sport.php'>Sport</a>  <a href='Thriller.php'>Thriller</a>  <a href='War.php'>War</a>  <a href='Western.php'>Western</a> 
 </span></span></div>
<div align=center class=container style=color:white>

<h2>Title: <?php echo  $movie['movie_title'];?> </h2>
Rating:<?php echo  $movie['movie_rating']; ?> </br>
Release Date:<?php echo $movie['release_year']; ?> </br>
<a href='form.php?action=edit&movie_title=Se7en'>Edit Movie</a>
<form method= POST>
		Quantity: <input type="text" name="quantity" value="1"/>
		<input type ="hidden" name="'movie_title" value= "<?php echo $movie['movie_title'];?>" />
		<input type ="hidden" name="genre" value= "<?php echo $movie['genre'];?>" />
		<input type ="submit" name="Add to Favorites" class="button"/>
		</form>

<a href='form.php?action=add'>Add Movie</a>				
				</div>










<div id="footer" >
<img src="images/reel.png" height='500' width='500'  /></div>
</body>
</html>
