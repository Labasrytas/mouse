<html>
<h2>Užsakymų sąrašas</h2>

<h3>Rūšiuoti pagal</h3>
	<form action='' method="POST">
		Vardą:<br />
	    <input type='text' name='name' />&nbsp;
	    <input type='submit' value='Filter' />
	</form>


<h3>Rezultatas</h3>
<?php

$db = mysqli_connect('localhost','verslas','VerSlas00','mysql')
	or die('Error connecting to MySQL server.');

// main query statement

$query = "SELECT name, address, quantity FROM orders";

// check for filter on 'name'

if($_POST && isset($_POST['name'])) {

	$query = $query . " where name like '%".$_POST['name'] ."%'";
}


$result = mysqli_query($db, $query) or die('Error querying database.');

// generate search result

echo '<table border="1">';
echo "\n";
echo '<tr>';
echo '<th>Name</th><th>Address</th><th>Quantity</th>';
echo '</tr>';

echo "\n";

while( $row = mysqli_fetch_array($result)){

	echo '<tr>';
	echo "<td>". $row['name'] . "</td><td>". $row['address'] . "</td><td>" . $row['quantity']. "</td></tr>";
	echo "\n";
} 

echo '</table>';

?>
<hr>
<form action="product.php">
<input type="submit" value="Eiti į produkto puslapį">
</form>
</html>


