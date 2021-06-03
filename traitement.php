
<?php

include("conn.php");


$nom = $idcom->quote($_POST['nom']); 

$prenom = $idcom->quote($_POST['prenom']);
$adresse = $idcom->quote($_POST['adresse']);
$email = $idcom->quote($_POST['email']);


if( !empty($nom) && !empty($prenom) && !empty($adresse) && !empty($email))   

{

$requete="INSERT INTO  porto
VALUES (DEFAULT, $nom, $prenom, $adresse, $email)";

$idcom->exec($requete);

}
?>

<a href="contact.php">Cliquez ici</a>

<?php header('Location: contact.php?success=1'); exit;