<?php

$cookie_name = "nbvisites";

if(isset($_POST["reset"])) {
    setcookie($cookie_name, 0, time() + 3600);
    $nbvisites = 0;
}
else {
    if (isset($_COOKIE[$cookie_name])) {
        $nbvisites = $_COOKIE[$cookie_name] + 1;
    }
    else {
        $nbvisites = 1;
    }
}
setcookie($cookie_name, $nbvisites, time() + 3600);

echo "<p style=\"color: green; font-weight: bold; font-family: Arial, sans-serif;\">Nombre de visites : ". $nbvisites . "</p>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nombre de visites</title>
</head>
<body>
    
    <form method="POST">
        <input type="submit" name="reset" value="Reset">
    </form>

</body>
</html>