<form method="get">
	<label>Nom : <input type="text" name="nom"></label><br />
	<label>Prénom : <input type="text" name="prenom"></label><br />
	<label>Âge : <input type="text" name="age"></label><br />
	<input type="submit" value="Envoyer">
</form>

<?php
echo "Le nombre d’argument GET envoyé est : " . count($_GET);
?>
