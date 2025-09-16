<?php
for ($i = 0; $i <= 1337; $i++) {
	if (in_array($i, [26, 37, 88, 1111, 3233])) {
		continue;
	}
	echo $i."<br />";
}
?>
