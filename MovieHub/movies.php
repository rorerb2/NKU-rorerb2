<?php
include('config.php');

include('functions.php');

$term = get('search-term');

$movie_title = null;

$sql = file_get_contents('sql/getMovie.sql');
$params = array(
	'movie_title' => $movie_title
);
$statement = $database->prepare($sql);
$statement->execute($params);
$movies = $statement->fetchAll(PDO::FETCH_ASSOC);
$movie = $movies[0];



//$name = substr($movie_title,0,1);


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
</head>
<body>
<div class="page">
<div align=center class=container style='margin-bottom:10px; padding-top:10px;'><h2>Movies</h2><span class=lc>Filter: <a href='?' onClick=""></a><span id='list_menu'>
 <a href='?name=num' >#</a>  <a href='?name=a' onClick=" <?php echo preg_match([a], $name) ?>">A</a>  <a href='?name=b'>B</a>  <a href='?name=c'>C</a>  <a href='?name=d'>D</a>  <a href='?name=e'>E</a>  <a href='?name=f'>F</a>  <a href='?name=g'>G</a>  <a href='?name=h'>H</a>  <a href='?name=i'>I</a>  <a href='?name=j'>J</a>  <a href='?name=k'>K</a>  <a href='?name=l'>L</a>  <a href='?name=m'>M</a>  <a href='?name=n'>N</a>  <a href='?name=o'>O</a>  <a href='?name=p'>P</a>  <a href='?name=q'>Q</a>  <a href='?name=r'>R</a>  <a href='?name=s'>S</a>  <a href='?name=t'>T</a>  <a href='?name=u'>U</a>  <a href='?name=v'>V</a>  <a href='?name=w'>W</a>  <a href='?name=x'>X</a>  <a href='?name=y'>Y</a>  <a href='?name=z'>Z</a> </span></span></div>

			<p>			
				<?php echo $movie['movie_title']; ?><br />
				<?php echo $movie['actor']; ?> <br />
				<?php echo $movie['movie_rating']; ?>
				<?php echo $movie['release']; ?><br />
				<a href="form.php?action=edit&movie_title=<?php echo $movie['movie_title'] ?>">Edit Movie</a><br />
			
		</p>
	</div>




<div id="wrapper">
		
		<div id="header">
		</div><!-- #header -->
		
		

<div id="footer" >
<img src="images/reel.png" height='500' width='500'  /></div>
</body>
</html>