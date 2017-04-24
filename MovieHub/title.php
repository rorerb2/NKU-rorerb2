<?php
include('config.php');

include('functions.php');

$term = get('search-term');


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
 <a href='?name=num' ><img src="images/0-9.jpg" height='150' width='150'   /></a>  <a href='actorsA.php'><img src="images/a.jpg" height='150' width='150'   /></a>  <a href='?name=b'><img src="images/b.jpg" height='150' width='150'  /></a>  <a href='?name=c'><img src="images/c.jpg" height='150' width='150'   /></a>  <a href='?name=d'><img src="images/D.jpg" height='150' width='150'   /></a>
 <a href='?name=e'><img src="images/e.jpg" height='150' width='150'  /></a>  <a href='?name=f'><img src="images/f.jpg" height='150' width='150'   /></a>  <a href='?name=g'><img src="images/g.jpg" height='150' width='150'  /></a>  <a href='?name=h'><img src="images/H.jpg" height='150' width='150'   /></a>  
  <div align=center class=container style='margin-bottom:10px; padding-top:10px;'><span class=lc><a href='?' onClick=""></a><span id='list_menu'>
 <a href='?name=i'><img src="images/I.jpg" height='150' width='150'   /></a>  <a href='?name=j'><img src="images/j.jpg" height='150' width='150'   /></a>  <a href='?name=k'><img src="images/K.jpg" height='150' width='150'   /></a> <a href='?name=l'><img src="images/L.jpg" height='150' width='150'   /></a>  <a href='?name=m'><img src="images/m.jpg" height='150' width='150'   /></a>  <a href='?name=n'><img src="images/n.jpg" height='150' width='150'   /></a>
 <a href='?name=o'><img src="images/o.jpg" height='150' width='150'   /></a>  <a href='?name=p'><img src="images/p.jpg" height='150' width='150'   /></a>  <a href='?name=q'><img src="images/Q.jpg" height='150' width='150'   /></a>    </div>
   <div align=center class=container style='margin-bottom:10px; padding-top:10px;'><span class=lc> <a href='?' onClick=""></a><span id='list_menu'>
 <a href='?name=r'><img src="images/R.jpg" height='150' width='150'  /></a>  <a href='?name=s'><img src="images/S.jpg" height='150' width='150'   /></a><a href='?name=t'><img src="images/t.jpg" height='150' width='150'   /></a>  <a href='?name=u'><img src="images/u.jpg" height='150' width='150'   /></a>  <a href='?name=v'><img src="images/v.jpg" height='150' width='150'   /></a>  <a href='?name=w'><img src="images/W.jpg" height='150' width='150'   /></a>  <a href='?name=x'><img src="images/X.jpg" height='150' width='150'   /></a> 
 <a href='?name=y'><img src="images/y.jpg" height='150' width='150'   /></a> <a href='?name=z'><img src="images/Z.jpg" height='150' width='150'   /></a> </span></span></div>
 
		
		

<div align=left id="footer" >
<img src="images/reel.png" height='500' width='500'  /></div>
</body>
</html>