<?php
  // Sécuriser la page en creant une session qui ridirige vers la de connexion
  session_start();
  if(!$_SESSION['mdp']){
     header('location: connexion.admin.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="utf-8">
</head>
<body>
    <a href="projet.php">Afficher tous les projets</a><br/>
    <a href="article.php">Afficher tous les articles</a>
</body>
</html>