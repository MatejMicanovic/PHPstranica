<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Register</title>
</head>

<body>
	<?php include "../reused/header.php" ?>
	<div class="Account">

		<form enctype="multipart/form-data" action="" method="POST">
			<p>Vaši podaci:</p>
			<div>
				<label>Ime: </label>
				<input type="text" id="Name" name="Name" /><br />
				<span id="imeMSG"></span>
			</div></br>
			<div>
				<label>Prezme: </label>
				<input type="text" id="Surname" name="Surname" /><br />
				<span id="prezimeMSG"></span>
			</div></br>
			<div>
				<label>Korisničko ime: </label>
				<input type="text" id="Username" name="Username" /><br />
				<span id="korisnicko_imeMSG"></span>
			</div></br>
			<div>
				<label>Sifra: </label>
				<input type="text" id="Pass1" name="Pass1" /><br />
			</div></br>
			<div>
				<label>Ponovljena šifra: </label>
				<input type="text" id="Pass2" name="Pass2" /><br />
				<span id="sifraMSG"></span>
			</div></br>

			<button type="reset" value="Poništi">Poništi</button>
			<button type="submit" id="slanje" value="Prihvati" name="submit">Prihvati</button>
	</div>
	</form>

	<?php
	if (isset($_POST['submit'])) {
		$ime = $_POST['Name'];
		$prezime = $_POST['Surname'];
		$korisnicko_ime = $_POST['Username'];
		$sifra = $_POST['Pass1'];
		$Tsifra = password_hash($sifra, CRYPT_BLOWFISH);
		$privilege = 1;

		$sql = "INSERT INTO korisnik (ime,prezime,korisnicko_ime,lozinka,razina) VALUES (?,?,?,?,?)";
		$ant = mysqli_stmt_init($dbc);

		if (mysqli_stmt_prepare($ant, $sql)) {
			mysqli_stmt_bind_param($ant, 'sssss', $ime, $prezime, $korisnicko_ime, $Tsifra, $privilege);
			if (mysqli_stmt_execute($ant)) {

				echo "<p>Uspješno ste se registrirali!</p>";
			} else {
				echo "<p>Istoimeni korisnik pronađen, probajte nešto drugo!<p>";
			};
		}

		mysqli_close($dbc);
	}
	?>

	</div>
	<?php include "../reused/footer.php" ?>
</body>

</html>