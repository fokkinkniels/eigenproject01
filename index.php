<?php 	
    require 'includes/header.php';	
    $gameview = new gameview();
	$games = $gameview->showAllGames();
	$userview = new usersview();
?>

	<!-- showcase -->
	<div class='ShowCasePhoto'>
		<img src="/img/pantheon.jpg" alt="ha it doesnt wurk">
		<div class='centered col-md-3'>

			<h1>                    
				<?php 
				$randIndex = array_rand($games);
				echo $games[$randIndex]['title']
				?>
			</h1>

			<p>
			<?php 
				$randIndex = array_rand($games);
				echo "Game by: ".$userview->showUserById($games[$randIndex]['user_id'])[0]['name'];  
			?>
			</p>
		</div>

	</div>

	<!-- ads certain amount of shocases to page -->
	<?php
			include 'includes/highlight.php';
	?>

	<!-- ads footer to page -->

</body>

</html>