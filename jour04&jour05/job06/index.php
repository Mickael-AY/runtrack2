<form method="get">
	<label>Nombre : <input type="text" name="nombre"></label>
	<input type="submit" value="Vérifier">
</form>

<?php
if (isset($_GET['nombre']) && $_GET['nombre'] !== "") {
	$n = $_GET['nombre'];
	if (is_numeric($n)) {
		if ($n % 2 == 0) {
			echo "Nombre pair";
		} else {
			echo "Nombre impair";
		}
	} else {
		echo "Veuillez entrer un nombre valide.";
	}
}
?>
