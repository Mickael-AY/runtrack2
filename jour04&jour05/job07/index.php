<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Job 07 - Maison ASCII</title>
	<style>
		body {
			font-family: monospace;
			white-space: pre;
		}
		.house {
			margin-top: 20px;
		}
	</style>
</head>
<body>
	<h2>Job 07</h2>
	<form method="get">
		Largeur : <input type="text" name="largeur">
		Hauteur : <input type="text" name="hauteur">
		<input type="submit" value="Afficher la maison">
	</form>

<?php
if (isset($_GET['largeur']) && isset($_GET['hauteur']) && is_numeric($_GET['largeur']) && is_numeric($_GET['hauteur'])) {
		$largeur = (int)$_GET['largeur'];
		$hauteur = (int)$_GET['hauteur'];
		if ($largeur > 1 && $hauteur > 1) {
				$maison = "";
				// Toit
				for ($i = 0; $i < $largeur; $i++) {
						$maison .= str_repeat(' ', $largeur - $i - 1);
						$maison .= '/';
						$maison .= str_repeat(' ', $i * 2);
						$maison .= "\\\n";
				}
				// Corps
				for ($i = 0; $i < $hauteur; $i++) {
						$maison .= '|';
						$maison .= str_repeat(' ', $largeur * 2 - 2);
						$maison .= "|\n";
				}
				// Sol
				$maison .= '|'.str_repeat('_', $largeur * 2 - 2)."|\n";
				echo '<div class="house">'.nl2br($maison).'</div>';
		} else {
				echo "<div class='house'>Valeurs minimales : largeur > 1, hauteur > 1.</div>";
		}
}
?>
</body>
</html>
