<?php
session_start();
// Initialisation ou reset
if (!isset($_SESSION['grille']) || isset($_POST['reset'])) {
	$_SESSION['grille'] = [
		['-','-','-'],
		['-','-','-'],
		['-','-','-']
	];
	$_SESSION['tour'] = 'X';
	$_SESSION['fin'] = false;
	$_SESSION['message'] = '';
}

// Gestion du coup joué
if (isset($_POST['case']) && !$_SESSION['fin']) {
	$pos = explode('_', $_POST['case']);
	$i = (int)$pos[0];
	$j = (int)$pos[1];
	if ($_SESSION['grille'][$i][$j] == '-') {
		$_SESSION['grille'][$i][$j] = $_SESSION['tour'];
		// Vérification victoire
		$g = $_SESSION['grille'];
		$t = $_SESSION['tour'];
		$win = false;
		for ($k=0;$k<3;$k++) {
			if ($g[$k][0]==$t && $g[$k][1]==$t && $g[$k][2]==$t) $win=true;
			if ($g[0][$k]==$t && $g[1][$k]==$t && $g[2][$k]==$t) $win=true;
		}
		if (($g[0][0]==$t && $g[1][1]==$t && $g[2][2]==$t) || ($g[0][2]==$t && $g[1][1]==$t && $g[2][0]==$t)) $win=true;
		if ($win) {
			$_SESSION['fin'] = true;
			$_SESSION['message'] = $t.' a gagné';
		} else {
			// Vérification match nul
			$plein = true;
			for ($a=0;$a<3;$a++) for ($b=0;$b<3;$b++) if ($g[$a][$b]=='-') $plein=false;
			if ($plein) {
				$_SESSION['fin'] = true;
				$_SESSION['message'] = 'Match nul';
			} else {
				$_SESSION['tour'] = ($_SESSION['tour']=='X') ? 'O' : 'X';
			}
		}
	}
}
?>
<h2>Jeu du Morpion</h2>
<form method="post">
<table border="1" style="border-collapse:collapse; text-align:center;">
<?php
for ($i=0;$i<3;$i++) {
	echo '<tr>';
	for ($j=0;$j<3;$j++) {
		echo '<td style="width:40px;height:40px;">';
		if ($_SESSION['grille'][$i][$j] == '-') {
			if (!$_SESSION['fin']) {
				echo '<button type="submit" name="case" value="'.$i.'_'.$j.'">-</button>';
			} else {
				echo '-';
			}
		} else {
			echo $_SESSION['grille'][$i][$j];
		}
		echo '</td>';
	}
	echo '</tr>';
}
?>
</table>
<br />
<button type="submit" name="reset">Réinitialiser la partie</button>
</form>
<p>
<?php
if (isset($_SESSION['message']) && $_SESSION['message'] != '') {
	echo $_SESSION['message'];
	if ($_SESSION['fin']) {
		// Reset automatique après victoire ou match nul
		session_unset();
		echo '<meta http-equiv="refresh" content="2">';
	}
}
?>
</p>
