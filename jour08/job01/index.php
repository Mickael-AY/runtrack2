<?php
session_start();
if (isset($_POST['reset'])) {
	$_SESSION['nbvisites'] = 0;
} else {
	if (!isset($_SESSION['nbvisites'])) {
		$_SESSION['nbvisites'] = 1;
	} else {
		$_SESSION['nbvisites']++;
	}
}
?>
<p style="color:#E427F5;">Le nombres de visites <?php echo $_SESSION['nbvisites']; ?></p>
<form method="post">
	<button type="submit" name="reset">reset</button>
</form>
