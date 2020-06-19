<?php 	
    require_once './includes/header.php';	
	$game = new Game();
?>

	<div class='ShowCasePhoto'>
		<img src="./etc/img/pantheon.jpg" alt="ha it doesnt wurk">
		<div class='centered col-md-3'>

			<h1>                    
				<?php 
				$randint = rand(1, count($game->getAllGames())-1);
				echo $game->getAllGames()[$randint]['title']  ;
				?>
			</h1>

			<p>
				<?php 
				echo $game->getAllGames()[$randint]['description'];
				?>
			</p>
		</div>

	</div>

	<!-- ads certain amount of shocases to page -->
	<?php
			include './includes/highlight.php';
	?>

	<!-- ads footer to page

</body>

</html> -->