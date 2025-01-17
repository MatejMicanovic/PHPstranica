<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Insert</title>

</head>

<body>
	<?php include "../reused/header.php" ?>
	<div class="Main">
		<?php
		$autor = $_SESSION['User'];
		$naslov = $_POST['Naslov'];
		$sazetak = $_POST['Sazetak'];
		$vijest = $_POST['Vijest'];
		$kategorija = 'Games';

		$slika = $_FILES['Slika']['name'];
		$datum = date('d.m.Y.');
		if (isset($_POST['Arhiva'])) {
			$archive = 1;
		} else {
			$archive = 0;
		}
		$target_dir = '../img/' . $slika;
		move_uploaded_file($_FILES["Slika"]["tmp_name"], $target_dir);

		$query = "INSERT INTO Clanci (datum, naslov, sazetak, tekst, slika, kategorija, arhiva, autor)
				VALUES (?,?,?,?,?,?,?,?)";
		$ant = mysqli_stmt_init($dbc);

		if (mysqli_stmt_prepare($ant, $query)) {
			mysqli_stmt_bind_param($ant, 'ssssssis', $datum, $naslov, $sazetak, $vijest, $slika, $kategorija, $archive, $autor);
			mysqli_stmt_execute($ant);
		}
		?>


		<section class="Clanak">
			<div>
				<h1> <?php echo "<p>&#9632;</p> " . $kategorija; ?><h1>
						<h2><?php echo $naslov; ?></h2>
						<h3>Autor: <?php echo $_SESSION['User']; ?></h3>
						<h3>Objavljeno: <?php echo $datum; ?></h3>
						<?php echo "<img src='../img/$slika' width='100%' height='300px'>"; ?>
						<h4><?php echo $sazetak; ?></h4>
						<p><?php echo $vijest; ?></p>
			</div>
		</section>
	</div>
	<?php include "../reused/footer.php" ?>
</body>

</html>