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

  
  if (isset($_GET['id']) AND !empty($_GET['id'])){
      $getid = $_GET['id'];
      $recuArticle = $idcom->prepare('SELECT * FROM publication WHERE id = ?');
      $recuArticle->execute(array($getid));
      if($recuArticle->rowCount() > 0){
          $deleteArticle = $idcom->prepare('DELETE FROM publication WHERE id = ?');
          $deleteArticle->execute(array($getid));
          header('location: article.php');

      }
      else{
          echo " Aucun article trouvé";
      }

  }
   else{
       echo "Aucun identifiant trouvé";
   }
  ?>