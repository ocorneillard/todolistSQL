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

$resultat = $bdd->query('SELECT * FROM todo');
while ($donnees = $resultat->fetch()) {
  if ($donnees['Checked'] == 0) {

    if (!isset($_POST['ID'])) {
      $donnees['Checked'] = 1;
    }

    $ID = $donnees['ID'];
    echo "<input id=\"$ID\" type=\"checkbox\" name=\"$ID\" value=\"ok\">";
    echo "<label for=\"$ID\"><span class=\"check\">✓</span>".$donnees['Do']." </label>";
  }
}

$resultat = null;


 ?>
