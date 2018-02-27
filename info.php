<?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=weatherapp;charset=utf8', 'root', 'Five137');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}



$resultat = $bdd->query('SELECT * FROM Météo');
?>
<form class="" action="" method="post">
<table align="center" cellpadding="10" border="1">
	<tr>
		<th>Ville</th>
		<th>Haut</th>
		<th>Bas</th>
	</tr>
<?php
while ($donnees = $resultat->fetch())
{
?>

	<tr>
			<td><input type="checkbox" name="villeArr[]" value="<?= $donnees['ville']; ?>"><?= $donnees['ville']; ?></td>
			<td><?= $donnees['haut']; ?></td>
			<td><?= $donnees['bas']; ?></td>
	</tr>
<?php
}
$resultat->closeCursor();
?>

<tr>
	<td><input type="text" name="ville" value=""></td>
	<td><input type="text" name="haut" value=""></td>
	<td><input type="text" name="bas" value=""></td>
</tr>
<tr>
	<td><input type="submit" name="submit" value="Ajouter"></td>
	<td></td>
	<td><input type="submit" name="eff" value="Effacer"></td>

</tr>
</form>

<?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=weatherapp;charset=utf8', 'root', 'Five137');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
				die('Erreur : '.$e->getMessage());
}



if (isset($_POST['submit']) && isset($_POST['ville']) && isset($_POST['haut']) && isset($_POST['bas']) ) {



	$send = $bdd->prepare('INSERT INTO Météo(ville,haut,bas) VALUES(:ville,:haut,:bas)');

	$send->execute(array(
		'ville' => $_POST['ville'],
		'haut'  => $_POST['haut'],
		'bas'   => $_POST['bas'],
	));
	$correct = "ok";
}

if ($correct == "ok") {
	header("LOCATION: info.php");
}

print_r($_POST['villeArr']);





if (isset($_POST['eff']) && isset($_POST['villeArr'])) {
	foreach (($_POST['villeArr']) as $key => $value) {
		$bdd->exec('DELETE FROM Météo WHERE ville = "'.$value.'"');
	}
	header("LOCATION: info.php");
}
$resultat->closeCursor();

?>
