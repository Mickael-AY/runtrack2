<?php
function gras($str) {
	$result = '';
	$mot = '';
	$i = 0;
	while (isset($str[$i])) {
		if ($str[$i] == ' ') {
			if (isset($mot[0]) && $mot[0] >= 'A' && $mot[0] <= 'Z') {
				$result .= '<b>' . $mot . '</b>';
			} else {
				$result .= $mot;
			}
			$result .= ' ';
			$mot = '';
		} else {
			$mot .= $str[$i];
		}
		$i++;
	}
	// Dernier mot
	if ($mot !== '') {
		if ($mot[0] >= 'A' && $mot[0] <= 'Z') {
			$result .= '<b>' . $mot . '</b>';
		} else {
			$result .= $mot;
		}
	}
	return $result;
}

function cesar($str, $decalage = 2) {
	$result = '';
	$i = 0;
	while (isset($str[$i])) {
		$c = $str[$i];
		if (($c >= 'a' && $c <= 'z') || ($c >= 'A' && $c <= 'Z')) {
			$isMaj = ($c >= 'A' && $c <= 'Z');
			$base = $isMaj ? 'A' : 'a';
			$pos = ord($c) - ord($base);
			$newPos = ($pos + $decalage) % 26;
			$result .= chr(ord($base) + $newPos);
		} else {
			$result .= $c;
		}
		$i++;
	}
	return $result;
}

function plateforme($str) {
	$result = '';
	$mot = '';
	$i = 0;
	while (isset($str[$i])) {
		if ($str[$i] == ' ') {
			$len = 0;
			while (isset($mot[$len])) $len++;
			if ($len >= 2 && $mot[$len-2] == 'm' && $mot[$len-1] == 'e') {
				$result .= $mot . '_';
			} else {
				$result .= $mot;
			}
			$result .= ' ';
			$mot = '';
		} else {
			$mot .= $str[$i];
		}
		$i++;
	}
	// Dernier mot
	if ($mot !== '') {
		$len = 0;
		while (isset($mot[$len])) $len++;
		if ($len >= 2 && $mot[$len-2] == 'm' && $mot[$len-1] == 'e') {
			$result .= $mot . '_';
		} else {
			$result .= $mot;
		}
	}
	return $result;
}

$resultat = '';
if (isset($_POST['str']) && isset($_POST['fonction'])) {
	$str = $_POST['str'];
	$fonction = $_POST['fonction'];
	if ($fonction == 'gras') {
		$resultat = gras($str);
	} elseif ($fonction == 'cesar') {
		$decalage = isset($_POST['decalage']) && $_POST['decalage'] !== '' ? (int)$_POST['decalage'] : 2;
		$resultat = cesar($str, $decalage);
	} elseif ($fonction == 'plateforme') {
		$resultat = plateforme($str);
	}
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Job 07 - Fonctions</title>
</head>
<body>
	<form method="post">
		<label>Texte : <input type="text" name="str"></label>
		<label>Fonction :
			<select name="fonction" onchange="document.getElementById('decalage').style.display = this.value == 'cesar' ? 'inline' : 'none';">
				<option value="gras">gras</option>
				<option value="cesar">cesar</option>
				<option value="plateforme">plateforme</option>
			</select>
		</label>
		<span id="decalage" style="display:none;">Décalage : <input type="text" name="decalage" value="2" size="2"></span>
		<button type="submit">Valider</button>
	</form>
	<div style="margin-top:20px;">
		<?php echo $resultat; ?>
	</div>
	<script>
	// Affiche le champ décalage si césar est sélectionné au rechargement
	window.onload = function() {
		var sel = document.getElementsByName('fonction')[0];
		var dec = document.getElementById('decalage');
		if (sel.value == 'cesar') dec.style.display = 'inline';
	};
	</script>
</body>
</html>
