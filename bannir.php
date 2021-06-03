<?php
session_start();

$servername='localhost';
 $username='root';
 $password='';
 

$idcom=new PDO("mysql:host=$servername;dbname=portfolio", $username, $password);
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recupUser = $idcom->prepare('SELECT * FROM projet WHERE id = ?');
    $recupUser->execute(array($getid));
    if($recupUser->rowCount() > 0){

        $bannirUser = $idcom->prepare('DELETE FROM projet WHERE id = ?');
        $bannirUser->execute(array($getid));

        header('location: projet.php');

    }else{
        echo "ERROR";
    }
}
else{
    echo "L'identifiant n'a pas été récupérer";
}
?>