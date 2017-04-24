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

	</head>
<body>

<div align=center class=container style='margin-bottom:10px; padding-top:10px;'><span class=lc><a href='?' onClick=""></a><span id='list_menu'>
 <a href='date1900.php' ><img src="images/1900.jpg" height='200' width='200'  /></a>  <a href='date1910.php'><img src="images/1910.jpg" height='200' width='200'  /></a> <a href='date1920.php'><img src="images/1920.jpg" height='200' width='200'  /></a></div>  
 <div align=center class=container style='margin-bottom:10px; padding-top:10px;'><span class=lc><a href='?' onClick=""></a><span id='list_menu'>
 <a href='date1930.php'><img src="images/1930.jpg" height='200' width='200'  /></a> <a href='date1940.php'><img src="images/1940.jpg" height='200' width='200'  /></a>   <a href='date1950.php'><img src="images/1950.jpg" height='200' width='200'  /></a></div> 
  <div align=center class=container style='margin-bottom:10px; padding-top:10px;'><span class=lc><a href='?' onClick=""></a><span id='list_menu'>
  <a href='date1960.php'><img src="images/1960.jpg" height='200' width='200'  /></a> <a href='date1970.php'><img src="images/1970.jpg" height='200' width='200'  /></a>  <a href='date1980.php'><img src="images/1980.jpg" height='200' width='200'  /></a>  </div>
 <div align=center class=container style='margin-bottom:10px; padding-top:10px;'><span class=lc><a href='?' onClick=""></a><span id='list_menu'>
   <a href='date1990.php'><img src="images/1990.jpg" height='200' width='200'  /></a> <a href='date2000.php'><img src="images/2000.jpg" height='200' width='200'  /></a>  <a href='date2010.php'><img src="images/2010.jpg" height='200' width='200'  /></a>  </span></span></div>

<div id="wrapper">
<div id="footer" >
<img src="images/reel.png" height='500' width='500'  /></div>
</body>
</html>