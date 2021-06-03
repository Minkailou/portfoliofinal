<?php

$servername = "localhost";
$username = "root";
$password = "";

try{
$idcom = new PDO("mysql:host=$servername;dbname=contact",$username,$password);
$idcom->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


}

catch(PDOexception $e){
	echo "Erreur de connexion :" .$e->getMessage();
}

?>