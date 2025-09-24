<?php
$selected = isset($_POST['style']) ? $_POST['style'] : 'style1';
if (in_array($selected, ['style1', 'style2', 'style3'])) {
	echo '<link rel="stylesheet" href="' . htmlspecialchars($selected) . '.css">';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Choix du style</title>
</head>
<body>
	<form method="post">
		<label for="style">Choisissez un style :</label>
		<select name="style" id="style">
			<option value="style1"' . ($selected == 'style1' ? ' selected' : '') . '>style1</option>
			<option value="style2"' . ($selected == 'style2' ? ' selected' : '') . '>style2</option>
			<option value="style3"' . ($selected == 'style3' ? ' selected' : '') . '>style3</option>
		</select>
		<input type="submit" value="Valider">
	</form>
</body>
</html>
