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

<?php

           if(isset($_POST['envoi'])){
           if(isset($_POST['titre']) && isset($_POST['monfichier']) && isset($_POST['decision']) && isset($_POST['url_projet']) && isset($_POST['lien_github'])){

            $titre = $idcom->quote($_POST['titre']);
            $monfichier = $idcom->quote($_POST['monfichier']);
            $decision = $idcom->quote($_POST['decision']);
            $url_projet = $idcom->quote($_POST['url_projet']);
            $lien_github = $idcom->quote($_POST['lien_github']);

            
                
                $requete="INSERT INTO  publication
                VALUES (DEFAULT, $titre, $monfichier, $decision, $url_projet, $lien_github)";
                
                $idcom->exec($requete);
           }
          }
          else{
          //     echo"ERROR";

          }
     ?>

  <!DOCTYPE html>
  <html>
  <head>
       <title>Afficher tous les articles</title>
       <meta charset="utf-8">
       <link href="style.admin.css" rel="stylesheet">
  </head>
  <body>
  <h1>Publication des articles</h1>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
     <fieldset>
     <legend><b>Publier articles</b></legend>
     <table>
      <tr>
      <td><b>Titre:</b></td>
      <td><input type="text" name="titre" size="40" maxlength="30"/></td>
      </tr>
      <tr>
      <td><b>Photo:</b></td>
      <td><input type="file" name="monfichier" accept="image/gif, image/jpeg, image/png" /></td>
      </tr>
      <tr>
      <td><b>Description:</b></td>
      <td><textarea name="decision" cols="45" rows="8">Ajoutez description</textarea></td>
      </tr>
      <tr>
      <td><b>url_projet:</b></td>
      <td><input type="text" name="url_projet"></td>
      </tr>
      <tr>
      <td><b>lien_github:</b></td>
      <td><input type="text" name="lien_github"></td>
      </tr>
      <tr>
         <td><input type="submit" name="envoi"></td>
      </tr>   
     </table>
     </fieldset>
     </form>



       <h1>Modification et Suppressions articles</h1>
       <?php
           $recupArticles = $idcom->query('SELECT * FROM publication ORDER BY  id DESC');
           while($article = $recupArticles->fetch()){
               ?>
               <div class="article">
                <div class="bloc_art">
                    <h1><?= $article['titre'];?></h1>
                    <br>
                    <p><?= $article['monfichier'];?></p>
                    <br>
                    <p><?= $article['decision'];?></p>
                    <br>
                    <p><?= $article['url_projet'];?></p>
                    <br>
                    <p><?= $article['lien_github'];?></p> 
                    <a href="supprimer.php?id=<?= $article['id']; ?>">
                    <button class="supp">Supprimer</button>
                    </a>
                    <a href="modifier.php?id=<?= $article['id']; ?>">
                    <button class='modif'>Modifier</button>
                    </a>
                </div>
               </div>
               <?php
           }
       ?>
  </body>
  </html>