<html>

	<h2>Namų gyvūnėlis</h2>
	<p>Šis gyvūnėlis - labai geras pasirinkimas. Jis suteiks Jums daugybę šaunių patirčių. Užsakymo formoje įrašykite savo vardą, adresą ir vienietų skaičių, kurį norite užsakyti.
	Tuomet paspauskite <i>Užsakymas</i> žemiau esantį klavišą. 
	</p>
		<img src="mouse.png" width="200px" />
<hr>
<h3>Įrašykite savo užsakymą</h3>
	<form action='' method="POST">
		Jūsų vardas:<br />
	    <input type='text' name='name' /><br />
		Jūsų adresas:<br />
	    <input type='text' name='address' /><br />
		kiekis:<br />
	    <input type='number' name='quantity' min="1" /><br /><br />
	    <input type='submit' value='Užsakymas' />
	</form>

<?php


if($_POST && isset($_POST['name'])&& isset($_POST['address']) && isset($_POST['quantity'])){
	$id = $_POST['id'];
	$db = mysqli_connect('localhost','verslas','VerSlas00','mysql')
			or die('Error connecting to MySQL server.');

	$ins = mysqli_query($db, "insert into orders (name, address, quantity) values".
		"('". $_POST['name']."','".$_POST['address']."',".$_POST['quantity'].")");

	if(!$ins) {
		echo ("<p><b>Error:</b>Visi laukai privalo būti užpildyti</p>");
	} else {
		echo ("<p>Užsakymas išsaugotas!</p>");
	}
} 

?>
<hr>
<form action="list.php">
<input type="submit" value="Eiti į paieškos puslapį">
</form>

</html>
