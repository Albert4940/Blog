<?php
	include("connexion.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Mon super blog !</h1>
	<p><a href="index.php">Retour a la liste des billets</a></p>

	<?php

		$bdd = connexion();
		$req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets where id = ?');
		$req->execute(array($_GET['billet']));
		$donnees = $req->fetch();

	?>

	<div class="news">
		<h3>
			<?echo htmlspecialchars($donnees['titre']);?>
			<em>le <? echo $donnees['date_creation_fr'];?></em>
		</h3>
		<p>
			<?
				//on affiche le contenu du billet
				echo nl2br(htmlspecialchars($donnees['contenu']));
			?>
			<br/>
		</p>
	</div>
	<h2>Commentaires</h2>
	<?		
		$req->closeCursor();

		//Recuperation des commentaires
		$req = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires where id_billet = ? ORDER BY date_commentaire');
		$req->execute(array($_GET['billet']));
		while($donnees = $req->fetch())
		{
	?>

	<p><strong><?echo htmlspecialchars($donnees['auteur']);?></strong> le <?echo $donnees['date_commentaire_fr'];?></p>
	<p><? echo nl2br(htmlspecialchars($donnees['commentaire']));?></p>
	<hr>
	<?
	}//Fin de la boucle des commentaires
	$req->closeCursor();
	?>
</body>
</html>