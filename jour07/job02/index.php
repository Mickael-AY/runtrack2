<?php
function bonjour($jour) {
	if ($jour) {
		echo "Bonjour";
	} else {
		echo "Bonsoir";
	}
}

// Exemples d'appel :
bonjour(true); // Affiche Bonjour
echo "<br />";
bonjour(false); // Affiche Bonsoir
?>
