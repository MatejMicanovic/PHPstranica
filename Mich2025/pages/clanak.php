<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Clanak</title>

</head>

<body>
	<?php include "../reused/header.php" ?>
	<div class="Main">
		<?php
		$id = $_GET["id"];
		$query = "SELECT * FROM clanci WHERE id = $id";
		$result = mysqli_fetch_array(mysqli_query($dbc, $query));
		?>



		<section class="Clanak">
			<div>
				<h1> <?php echo "<p>&#9632;</p> " . $result['kategorija']; ?><h1>
						<h2><?php echo $result['naslov']; ?></h2>
						<h3>Autor: <?php echo $result['autor']; ?></h3>
						<h3>Objavljeno: <?php echo $result['datum'] ?></h3>
						<?php echo "<img src='../img/" . $result['slika'] . "' width='100%' height='300px'>"; ?>
						<h4><?php echo $result['sazetak']; ?></h4>
						<p><?php echo $result['tekst']; ?></p>
			</div>
		</section>
		<?php include "../reused/footer.php" ?>
	</div>
</body>

</html>