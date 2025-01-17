<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Edit</title>
</head>

<body>
	<?php include "../reused/header.php" ?>
	<div class="Main">

		<?php
		$query = "SELECT * FROM clanci";
		$result = mysqli_query($dbc, $query);
		while ($row = mysqli_fetch_array($result)) {
			echo "<form enctype='multipart/form-data' action=''  method='POST'>";

			echo "<div><label>Naslov vijesti: </label><input type='text' name='naslov' value='" . $row['naslov'] . "'/> <label>ID: <input type='text' class='IDbox' name='id' value=" . $row['id'] . " readonly> </label></div><br/>";
			echo "<div><label>Kratki sažetak: </label><textarea name='sazetak' cols='30' rows='10'>" . $row['sazetak'] . "</textarea></div><br/>";
			echo "<div><label>Tekst vijesti: </label><textarea name='vijest' cols='30' rows='10'>" . $row['tekst'] . "</textarea></div><br/>";
			echo "<div><label>Kategorija vijesti (Trenutno " . $row['kategorija'] . "): </label>";
			echo "<select name='kategorija'><option>Games</option></select></div>";
			echo "<div><label>Slika: </label><input type='file' accept='image/png,image/jpg' id='Slika' name='Slika' value='" . $row['slika'] . "'/><br/><label>Trenutna slika (Hover): </label> <img class='preview' src='../img/" . $row['slika'] . "'/></div><br/>";
			echo "<div><label>Arhiva: </label><input type='checkbox' name='arhiva'/></div>";
			echo "<div><button type='submit' name='delete'>Izbriši članak</button><button type='submit' value='Izmijeni' name='change'>Izmijeni članak</button></div><br/>";
			echo "</form>";
		}

		if (isset($_POST['delete'])) {
			$id = $_POST['id'];
			$query = "DELETE FROM clanci WHERE id=$id ";
			$result = mysqli_query($dbc, $query);
			//hvala stack overflow - reloada page
			echo "<meta http-equiv='refresh' content='0'>";
		}

		if (isset($_POST['change'])) {

			$slika = $_FILES['Slika']['name'];
			$naslov = $_POST['naslov'];
			$sazetak = $_POST['sazetak'];
			$vijest = $_POST['vijest'];
			$kategorija = $_POST['kategorija'];
			$id = $_POST['id'];
			if (isset($_POST['arhiva'])) {
				$arhiva = 1;
			} else {
				$arhiva = 0;
			}
			$target_dir = '../img/' . $slika;
			move_uploaded_file($_FILES["Slika"]["tmp_name"], $target_dir);
			$query = "UPDATE clanci SET naslov='$naslov', sazetak='$sazetak', tekst='$vijest', slika='$slika', kategorija='$kategorija', arhiva='$arhiva' WHERE id=$id ";
			$result = mysqli_query($dbc, $query);
			//hvala stack overflow - reloada page
			echo "<meta http-equiv='refresh' content='0'>";
		}


		?>


	</div>
	<?php include "../reused/footer.php" ?>
</body>

</html>