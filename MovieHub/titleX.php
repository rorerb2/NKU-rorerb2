<?php
include('config.php');

include('functions.php');

$term = get('search-term');

$actor_name = null;

$letter = 'Z%';


$sql = file_get_contents('sql/orderbytitle.sql');
$params = array(
	'letter' => $letter
);
$statement = $database->prepare($sql);
$statement->execute($params);
$titles = $statement->fetchAll(PDO::FETCH_ASSOC);

$title = $titles[0];


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
 <a href='titleNum.php' >#</a>  <a href='titleA.php'>A</a>  <a href='titleB.php'>B</a>  <a href='titleC.php'>C</a>  <a href='titleD.php'>D</a>  
 <a href='titleE.php'>E</a>  <a href='titleF.php'>F</a>  <a href='titleG.php'>G</a>  <a href='titleH.php'>H</a>  <a href='titleI.php'>I</a>  <a href='titleJ.php'>J</a>  <a href='titleK.php'>K</a>  
 <a href='titleL.php'>L</a>  <a href='titleM.php'>M</a>  <a href='titleN.php'>N</a>  <a href='titleO.php'>O</a>  <a href='titleP.php'>P</a>  <a href='titleQ.php'>Q</a>  <a href='titleR.php'>R</a>  
 <a href='titleS.php'>S</a>  <a href='titleT.php'>T</a>  <a href='titleU.php'>U</a>  <a href='titleV.php'>V</a>  <a href='titleW.php'>W</a>  <a href='titleX.php'>X</a>  <a href='titleY.php'>Y</a> 
 <a href='titleZ.php'>Z</a> </span></span></div>
 
 				<?php echo $title['movie_title']; ?><br />
				<?php echo $title['category_name']; ?> <br />
				<?php echo $title['genre']; ?>	





</body>
</html>