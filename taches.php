<?php

if (isset($_POST['submit']) && isset($_POST['tache'])) {
$tache = $_POST['tache'];
try {
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=todolist;charset=utf8', 'root', 'Five137');
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$send = $bdd->prepare
	('INSERT INTO todo (Do, Checked)
	  VALUES(:tache, 1)');

  $send->execute(array('tache' => $tache,));

  header('LOCATION: index.php');
  }

  catch(Exception $e)
  {
  	// En cas d'erreur, on affiche un message et on arrête tout
  				die('Erreur : '.$e->getMessage());
  }
}
 ?>
