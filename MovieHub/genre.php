<?php
include('config.php');

		
	


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
</div>
	</head>
<body>




<div align=center class=container style='margin-bottom:10px; padding-top:10px;'><span class=lc><a href='?' onClick=""></a><span id='list_menu'>
 <a href='Action.php' ><img src="images/action.jpg" height='150' width='150'   /></a>  <a href='Adventure.php' ><img src="images/adventure.jpg" height='150' width='150'   /></a>  <a href='Biography.php'><img src="images/biography.jpg" height='150' width='150'   /></a>  <a href='Comedy.php'><img src="images/comedy.jpg" height='150' width='150'   /></a>  
 <a href='Crime.php'><img src="images/crime.jpg" height='150' width='150'   /></a>   <a href='Documentary.php'><img src="images/documentary.jpg" height='150' width='150'   /></a>  <a href='Drama.php'><img src="images/drama.png" height='150' width='150'   /></a>  <a href='Family.php'><img src="images/family.jpeg" height='150' width='150'   /></a>  
 <a href='Fantasy.php'><img src="images/fantasy.jpg" height='150' width='150'   /></a>  <a href='History.php'><img src="images/history.jpg" height='150' width='150'   /></a>  <a href='Horror.php'><img src="images/horror.jpg" height='150' width='150'   /></a> <a href='Musical.php'><img src="images/Musicals.jpg" height='150' width='150'   /></a>  
 <a href='Mystery.php'><img src="images/mystery.jpg" height='150' width='150'   /></a>   <a href='Romance.php'><img src="images/romance.jpg" height='150' width='150'   /></a>  <a href='Sci Fi.php'><img src="images/scifi.jpg" height='150' width='150'   /></a>  <a href='Short.php'><img src="images/Short Films-2.jpg" height='150' width='150'   /></a> 
 <a href='Sport.php'><img src="images/sport2.png" height='150' width='150'   /></a>  <a href='Thriller.php'><img src="images/thriller.jpg" height='150' width='150'   /></a>  <a href='War.php'><img src="images/war.jpg" height='150' width='150'   /></a>  <a href='Western.php'><img src="images/western.jpg" height='150' width='150'   /></a> 
 </span></span></div>






<div id="footer" >
<img src="images/reel.png" height='500' width='500'  /></div>
</body>
</html>