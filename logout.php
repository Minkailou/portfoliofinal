<!-- Systéme de deconnexion -->
<?php
  session_start();
  $_SESSION = array();
  session_destroy();
  header('location: connexion.admin.php');
?>