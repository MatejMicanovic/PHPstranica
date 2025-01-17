<!DOCTYPE HTML>
<html lang="hr">

<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Kontakti</title>
</head>

<?php include "../reused/header.php" ?>
<main>
	<div class="contact">
		<h1>Javite nam se</h1>
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11123.246281474563!2d15.9710931!3d45.815032!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xadeaf39ec02c0e37!2sCrni%20ma%C4%8Dak!5e0!3m2!1shr!2shr!4v1673089471850!5m2!1shr!2shr" width="2000" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		<form action="adduser.php" id="contact_form" name="contact_form" method="post">
			<div>
				<label for="firstname">Ime: </label>
				<input type="text" id="firstname" name="firstname" placeholder="Vaše ime..." required>
			</div>
			<div>
				<label for="lastname">Prezime: </label>
				<input type="text" id="lastname" name="lastname" placeholder="Your prezime..." required>
			</div>
			<div>
				<label for="email">E-mail: </label>
				<input type="text" id="email" name="email" placeholder="Vaš email..." required>
			</div>
			<div>
				<label for="country">Država</label>
				<select id="country" name="country">
					<option value="">Please select</option>
					<option value="GER">Germany</option>
					<option value="HR" selected>Croatia</option>
					<option value="SRB">Serbia</option>
				</select>
			</div>
			<div>
				<textarea class="form-control" id="message" name="message" placeholder="Napišite nam nešto"></textarea>
			</div>
			<div>
				<input type="submit" value="Pošalji">
			</div>
		</form>
	</div>
</main>



<?php include "../reused/footer.php" ?>
</body>

</html>