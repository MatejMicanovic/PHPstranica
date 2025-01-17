<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Unos</title>

</head>

<body>
	<?php include "../reused/header.php" ?>
	<div class="Main">
		<form enctype="multipart/form-data" action="insert.php" method="POST">
			<p>Unos novog članka:</p>
			<div>
				<label>Naslov vijesti:</label>
				<input type="text" id="Naslov" name="Naslov" /><br />
				<span id="naslovMSG"></span>

			</div></br>
			<div>
				<label>Kratki sažetak:</label></br>
				<textarea name="Sazetak" id="Sazetak" cols="30" rows="5"></textarea><br />
				<span id="sazetakMSG"></span>
			</div></br>
			<div>
				<label>Tekst vijesti:</label></br>
				<textarea name="Vijest" id="Vijest" cols="30" rows="10"></textarea><br />
				<span id="vijestMSG"></span>
			</div></br>
			<div>
				<label>Kategorija vijesti:</label>
				<select name="Kategorija" id="Kategorija">
					<option value="default">Odaberite kategoriju</option>
					<option value="Games">Igre</option>
				</select><br />
				<span id="kategorijaMSG"></span>
			</div></br>
			<div>
				<label>Slika:</label>
				<input type="file" accept="image/png,image/jpg" id="Slika" name="Slika" /><br />
				<span id="slikaMSG"></span>
			</div>
			<div>
				<label>Spremit u arhivu:</label>
				<input type="checkbox" name="Arhiva" />
			</div>
			<div>
				<button type="reset" value="Poništi">Poništi</button>
				<button type="submit" id="slanje" value="Prihvati" name="submit">Prihvati</button>
			</div>
		</form>
	</div>
	<?php include "../reused/footer.php" ?>
</body>

</html>