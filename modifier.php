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
        $articleInfos = $recuArticle->fetch();
        $titre = $articleInfos['titre'];
        $monfichier = $articleInfos['monfichier'];
        $decision = str_replace('<br/>', '',$articleInfos['decision']);
        $url_projet = $articleInfos['url_projet'];
        $lien_github = $articleInfos['lien_github'];

        if(isset($_POST['valider'])){
            $titre_saisie = htmlspecialchars($_POST['titre']);
            $monfichier_saisie = htmlspecialchars($_POST['monfichier']);
            $decision_saisie = nl2br(htmlspecialchars($_POST['decision']));
            $url_projet_saisie = htmlspecialchars($_POST['url_projet']);
            $lien_github_saisie = htmlspecialchars($_POST['lien_github']);
    
            $updateArticle = $idcom->prepare('UPDATE publication SET titre = ?, monfichier = ? , decision = ? , url_projet = ? , lien_github = ? WHERE id = ?');
            $updateArticle->execute(array($titre_saisie, $monfichier_saisie, $decision_saisie, $url_projet_saisie, $lien_github_saisie, $getid));
            
            header('location: portfolio.php');

        
        }

        
        
    }else{
        echo "aucun article trouvé";
    }
    
}
else{ 
echo "Aucun identifiant trouvé";
}
?>
<!DOCTYPE html>
<html>
<head>
     <title>Modifier article</title>
</head>
<body>
<form method="POST" action="">
     <fieldset>
     <legend><b>Modifier articles</b></legend>
     <table>
      <tr>
      <td><b>Titre:</b></td>
      <td><input type="text" name="titre" value="<?= $titre; ?>"  size="40" maxlength="30"/></td>
      </tr>
      <tr>
      <td><b>Photo:</b></td>
      <td><input type="file" name="monfichier"  value="<?= $monfichier; ?>" accept="image/gif, image/jpeg, image/png" size="30"/></td>
      </tr>
      <tr>
      <td><b>Description:</b></td>
      <td><textarea name="decision" cols="45" rows="8"><?=$decision; ?></textarea></td>
      </tr>
      <tr>
      <td><b>url_projet:</b></td>
      <td><input type="text" name="url_projet" value="<?= $url_projet; ?>" size="40" maxlength="200"></td>
      </tr>
      <tr>
      <td><b>lien_github:</b></td>
      <td><input type="text" name="lien_github" value="<?= $lien_github; ?>" size="40" maxlength="200"></td>
      </tr>
      <tr>
         <td><input type="submit" name="valider"></td>
      </tr>   
     </table>
     </fieldset>
     </form>
     
     </body>
     </html>