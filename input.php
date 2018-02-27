<?php

try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=todolist;charset=utf8', 'root', 'Five137');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
				die('Erreur : '.$e->getMessage());
}


    // Todo vers Archives
if (isset($_POST['todo']) && isset($_POST['ID'])) {
	foreach (($_POST['ID']) as $key => $value) {
		$bdd->exec('UPDATE todo SET Checked=0 WHERE Do = "'.$value.'"');
	}
	header("LOCATION: index.php");
}

    // Delete Archive
if (isset($_POST['sub']) && isset($_POST['archive'])) {
	foreach (($_POST['archive']) as $key => $value) {
		$bdd->exec('DELETE FROM todo WHERE Do = "'.$value.'"');
	}
	header("LOCATION: index.php");
}
 ?>
