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

$resultat = $bdd->query('SELECT * FROM todo WHERE Checked=1');
while ($donnees = $resultat->fetch()) {
	$ID = $donnees['ID'];
?>

		<input id="<?=$ID;?>" type="checkbox" name="ID[]" value="<?=$donnees['Do'];?>">
		<label for="<?=$ID;?>"><span class="check">✓</span> <?=$donnees['Do'];?> </label>
<?php
}
$resultat->closeCursor();


?>
