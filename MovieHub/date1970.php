<?php
include('config.php');


$begin_date = '1970-01-01';
$end_date = '1979-12-31';

$sql = file_get_contents('sql/orderByDate.sql');
$params = array(
	'begin_date' => $begin_date,
	'end_date' => $end_date
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
 <a href='date1900.php' >1900-1909</a>  <a href='date1910.php' >1910-1919</a>  <a href='date1920.php'>1920-1929</a>  
 <a href='date1930.php'>1930-1939</a>  <a href='date1940.php'>1940-1949</a>   <a href='date1950.php'>1950-1959</a>  <a href='date1960.php'>1960-1969</a>  
 <a href='date1970.php'>1970-1979</a>  <a href='date1980.php'>1980-1989</a>  <a href='date1990.php'>1990-1999</a>  <a href='date2000.php'>2000-2009</a>  
 <a href='date2010.php'>2010-present</a>  </span></span></div>
<div align=center class=container style=color:white>

<h2>Title: <?php echo  $movie['movie_title'];?> </h2>
Genres:	<?php echo  $movie['genre']; ?> </br>
Rating:<?php echo  $movie['movie_rating']; ?> </br>
Release Date:<?php echo $movie['release_year']; ?> </br>
				
				</div>
				









<div id="wrapper">
		
		<div id="header">
		</div><!-- #header -->
		
		

<div id="footer" >
<img src="images/reel.png" height='500' width='500'  /></div>
</body>
</html>
