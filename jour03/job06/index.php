<?php
$str = "Les choses que l'on possède finissent par nous posséder.";
$len = 0;
while (isset($str[$len])) {
	$len++;
}
for ($i = $len - 1; $i >= 0; $i--) {
	echo $str[$i];
}
?>
