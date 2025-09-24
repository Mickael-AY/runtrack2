<form method="get">
	<label>Nom : <input type="text" name="nom"></label><br />
	<label>Prénom : <input type="text" name="prenom"></label><br />
	<label>Âge : <input type="text" name="age"></label><br />
	<input type="submit" value="Envoyer">
</form>

<?php
if (count($_GET) > 0) {
	echo '<table border="1">';
	echo '<thead><tr><th>Argument</th><th>Valeur</th></tr></thead>';
	echo '<tbody>';
	foreach ($_GET as $arg => $val) {
		echo '<tr><td>' . htmlspecialchars($arg) . '</td><td>' . htmlspecialchars($val) . '</td></tr>';
	}
	echo '</tbody></table>';
}
?>
