<?php
include('config.php');

include('functions.php');

$term = get('search-term');

$actor_name = null;

$letter = 'N%';

$name = get('name');

$sql = file_get_contents('sql/orderByName.sql');
$params = array(
	'letter' => $letter
);
$statement = $database->prepare($sql);
$statement->execute($params);
$actors = $statement->fetchAll(PDO::FETCH_ASSOC);

$actor = $actors[0];
$name = substr($actor_name,0,1);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$actor_name = $_POST['actor_name']; 
$sql = file_get_contents('sql/insertFavorites.sql');
$params = array(
	'actor_name' => $actor_name,
);
$statement = $database->prepare($sql);
$statement->execute($params);
}
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
 <a href='actorsNum.php' >#</a>  <a href='actorsA.php'?>">A</a>  <a href='actorsB.php'>B</a>  <a href='actorsC.php'>C</a>  <a href='actorsD.php'>D</a>  
 <a href='actorsE.php'>E</a>  <a href='actorsF.php'>F</a>  <a href='actorsG.php'>G</a>  <a href='actorsH.php'>H</a>  <a href='actorI.php'>I</a>  <a href='actorsJ.php'>J</a>  <a href='actorsK.php'>K</a>  
 <a href='actorsL.php'>L</a>  <a href='actorsM.php'>M</a>  <a href='actorsN.php'>N</a>  <a href='actorsO.php'>O</a>  <a href='actorsP.php'>P</a>  <a href='actorsQ.php'>Q</a>  <a href='actorsR.php'>R</a>  
 <a href='actorsS.php'>S</a>  <a href='actorsT.php'>T</a>  <a href='actorsU.php'>U</a>  <a href='actorV.php'>V</a>  <a href='actorsW.php'>W</a>  <a href='actorsX.php'>X</a>  <a href='actorsY.php'>Y</a> 
 <a href='actorsZ.php'>Z</a> </span></span></div>
 
 <a href='form2.php?action=edit&actor_name='>Edit Actor</a>
<div align=center class=container>
 				<?php echo $actor['movie_title']; ?><br />
				<?php echo $actor['actor_name']; ?> <br />
				<?php echo $actor['character_name']; ?>
<form action="" method="POST">
				<input type ="hidden" name="'movie_title" value= "<?php echo$actor['actor_name'];?>" />
				<input type ="submit" name="Add to Favorites" class="button"/>
				</form>				

<a href='form2.php?action=add&actor_name='>Add Actor</a>				
				</div>





</body>
</html>