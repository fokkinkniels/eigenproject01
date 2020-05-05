<?php
    include '/includes/autoLoader.inc.php';
    session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>MyWebsite</title>
	<link rel="stylesheet" type="text/css" href="css/styleHomepage.css">
</head>

<body>
	
	<!-- ads header to page -->
	<?php 	require './includes/header.php';	?>


	<section id="showcase">
		<div class="container">
			<div class="showcase_text">
				<h1 style="font-size: 8vh ">"ShowCase" </h1>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.
				</p>
			</div>
		</div>
		<div style="padding-bottom: 70px"></div>
	</section>


	<!-- ads certain amount of shocases to page -->
	<?php
		for ($x = 0; $x < 1; $x++) {
			echo '<div class="row">';

				for ($y = 0; $y < 2; $y++) {
					include './includes/highlight.php';
				}

			echo '</div>';
		}
	?>

	<!-- ads footer to page -->
	<?php require './includes/footer.php'; ?>

</body>


</html>