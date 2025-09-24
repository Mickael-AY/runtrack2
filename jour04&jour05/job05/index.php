<form method="post">
	<label>Nom d'utilisateur : <input type="text" name="username"></label><br />
	<label>Mot de passe : <input type="password" name="password"></label><br />
	<input type="submit" value="Se connecter">
</form>

<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
	if ($_POST['username'] === 'John' && $_POST['password'] === 'Rambo') {
		echo "C’est pas ma guerre";
	} else {
		echo "Votre pire cauchemar";
	}
}
?>
