<?php
$str = "I'm sorry Dave I'm afraid I can't do that";
$voyelles = ['a','e','i','o','u','y','A','E','I','O','U','Y'];
$i = 0;
while (isset($str[$i])) {
	$is_voyelle = false;
	$j = 0;
	while (isset($voyelles[$j])) {
		if ($str[$i] == $voyelles[$j]) {
			$is_voyelle = true;
			break;
		}
		$j++;
	}
	if ($is_voyelle) {
		echo $str[$i];
	}
	$i++;
}
?>
