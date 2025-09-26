<?php
// Si le bouton connexion est cliqué
if (isset($_POST['connexion'])) {
    $prenom = trim($_POST['prenom']);
    if (!empty($prenom)) {
        // On crée un cookie qui dure 1 heure
        setcookie("prenom", htmlspecialchars($prenom), time() + 3600, "/");
        // Recharger la page pour prendre en compte le cookie
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Si le bouton déconnexion est cliqué
if (isset($_POST['deco'])) {
    // Supprimer le cookie en mettant une date expirée
    setcookie("prenom", "", time() - 3600, "/");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion avec cookie</title>
</head>
<body>
    <?php if (!isset($_COOKIE['prenom'])): ?>
        <!-- Formulaire de connexion -->
        <form method="post">
            <input type="text" name="prenom" placeholder="Entrez votre prénom">
            <button type="submit" name="connexion">Connexion</button>
        </form>
    <?php else: ?>
        <!-- Message de bienvenue + bouton déconnexion -->
        <p>Bonjour <?= htmlspecialchars($_COOKIE['prenom']) ?> !</p>
        <form method="post">
            <button type="submit" name="deco">Déconnexion</button>
        </form>
    <?php endif; ?>
</body>
</html>

