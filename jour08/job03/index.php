<?php
session_start();
if (!isset($_SESSION['prenoms'])) {
	$_SESSION['prenoms'] = [];
}
if (isset($_POST['reset'])) {
	$_SESSION['prenoms'] = [];
} elseif (isset($_POST['prenom']) && $_POST['prenom'] !== '') {
	$_SESSION['prenoms'][] = $_POST['prenom'];
}
?>
<form method="post">
	<input type="text" name="prenom" placeholder="Entrez un prénom">
	<button type="submit">Ajouter</button>
	<button type="submit" name="reset">reset</button>
</form>
<ul>
<?php
foreach ($_SESSION['prenoms'] as $p) {
	echo '<li>' . htmlspecialchars($p) . '</li>';
}
?>
</ul>
