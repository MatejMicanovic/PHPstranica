<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>ACC</title>
</head>

<body>
	<?php include "../reused/header.php" ?>
	<div class="Account">

		<?php
		if (empty($_SESSION['priveleges'])) {
			echo "<form action='' method='POST'>
						<p>LOGIN:</p>
						<label>Korisničko ime: </label><input type='text' name='korisnickoIme'><br/>
						<label>Šifra: </label><input type='password' name='sifra'><br/>
						<input type='reset' name='brisi' value='Obriši'> <input type='submit' name='submit' value='Prijava'><br/></form>";
		}

		if (!empty($_SESSION['priveleges'])) {
			echo "	<form class='borderless' action='' method='POST'>
							<button class='bigButton' name='out'>LOG OUT</button>
						</form>";
		}

		if (isset($_POST['out'])) {
			session_unset();
			//hvala stack overflow - reloada page
			echo "<meta http-equiv='refresh' content='0'>";
		}

		if (isset($_POST['submit'])) {
			$name = $_POST['korisnickoIme'];
			$pass = $_POST['sifra'];

			$query = "SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime=?";
			$ant = mysqli_stmt_init($dbc);
			if (mysqli_stmt_prepare($ant, $query)) {
				mysqli_stmt_bind_param($ant, 's', $name);
				mysqli_stmt_execute($ant);



				mysqli_stmt_store_result($ant);
			}
			mysqli_stmt_bind_result($ant, $name2, $pass2, $priveleges);
			mysqli_stmt_fetch($ant);

			if (mysqli_stmt_num_rows($ant) > 0) {
				if (password_verify($pass, $pass2)) {
					$_SESSION['User'] = $name;
					$_SESSION['priveleges'] = $priveleges;

					echo "<p>Pozdrav! Vi ste: " . $_SESSION['User'] . "!";
					//hvala stack overflow - reloada page
					echo "<meta http-equiv='refresh' content='0'>";
				} else {
					echo "Pogrešna šifra";
				}
			} else {
				echo "<p>Korisnik nije pronađen: <a href='./Registracija.php'>(registracija?)</a></p>";
			}



			mysqli_close($dbc);
		}

		?>

	</div>
	<?php include "../reused/footer.php" ?>
</body>

</html>