<?php
 $servername='localhost';
 $username='root';
 $password='';
 
 try{
 $idcom=new PDO("mysql:host=$servername;dbname=portfolio", $username, $password);
 $idcom->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
}
 catch(PDOException $e){
     echo "Error connexion". $e->getMessage();
 }
  // Sécuriser la page en creant une session qui ridirige vers la de connexion
  session_start();
  if(!$_SESSION['mdp']){
     header('location: connexion.admin.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Afficher les projets</title>
    <meta charset="utf-8">
</head>

<body>
    <!-- Afficher tous les membres  -->
    <?php
       $requete = $idcom->query('SELECT * FROM publication');
       while($user = $requete->fetch()){
           ?>
           <p><?= $user['titre'].'</br>', $user['monfichier'].'</br>', $user['decision'].'</br>', $user['url_projet'].'</br>', $user['lien_github'].'</br>';?><a href="bannir.php?id=<?= $user['id']; ?>"
           style="color:red; text-decoration:none;">Bannir le projet</a></p>
           <?php
       }
    ?>
    <!-- Fin d'afficher tous les membres -->
</body>
</html>