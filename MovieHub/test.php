			<div class="dropdown-content2">
				<a href="#">1900-1909</a>
			</div>
				  <div class="dropdown-content2">
				<a href="#">A</a>
			</div>
			
			
				}
	elseif($password != $password2){
		echo 'Passwords do not match';
		header('location: register.php');
	}
	else{
		echo 'Email already used';
		header('location: register.php');
	}
	if($users['birthdate'] >= date('Y-m-d', strtotime('-18 years'))){
		
		
	}
	
	<?php foreach($genres as $genre) : ?>
				<li><?php echo $genre['movie_title']; ?> <br /></li>
				<?php endforeach; ?>
				
					$sql = file_get_contents('sql/getGenre.sql');
	$params = array(
		'movie_title' => $movie_title
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$genres = $statement->fetchAll(PDO::FETCH_ASSOC);