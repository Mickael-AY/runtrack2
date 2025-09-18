<?php
$str = "Certaines choses changent, et d'autres ne changeront jamais.";
$result = "";
$i = 0;
// Calculer la longueur sans fonction système
$len = 0;
while (isset($str[$len])) {
	$len++;
}
if ($len > 0) {
	for ($i = 1; $i < $len; $i++) {
		$result .= $str[$i];
	}
	$result .= $str[0];
	echo $result;
}
?>
