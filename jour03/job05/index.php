<?php
$str = "On n’est pas le meilleur quand on le croit mais quand on le sait";
$dic = ["consonnes" => 0, "voyelles" => 0];
$voyelles = ['a','e','i','o','u','y','A','E','I','O','U','Y','é','è','ê','à','ù','â','î','ô','û'];
$i = 0;
while (isset($str[$i])) {
	$char = $str[$i];
	// Vérifie si c'est une lettre
	if (($char >= 'a' && $char <= 'z') || ($char >= 'A' && $char <= 'Z') || in_array($char, ['é','è','ê','à','ù','â','î','ô','û'])) {
		// Vérifie si c'est une voyelle
		$is_voyelle = false;
		$j = 0;
		while (isset($voyelles[$j])) {
			if ($char == $voyelles[$j]) {
				$is_voyelle = true;
				break;
			}
			$j++;
		}
		if ($is_voyelle) {
			$dic["voyelles"]++;
		} else {
			$dic["consonnes"]++;
		}
	}
	$i++;
}
echo '<table border="1">';
echo '<thead><tr><th>Voyelles</th><th>Consonnes</th></tr></thead>';
echo '<tbody><tr><td>' . $dic["voyelles"] . '</td><td>' . $dic["consonnes"] . '</td></tr></tbody>';
echo '</table>';
?>
