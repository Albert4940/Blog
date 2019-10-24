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


	<div class="news">
		<h3>
			<?=htmlspecialchars($post['title']);?>
			<em>le <?=$post['creation_date_fr'];?></em>
		</h3>
		<p>
			<?=nl2br(htmlspecialchars($post['content']));
			?>
			<br/>
		</p>
	</div>
	<h2>Commentaires</h2>
	<?		
		//$req->closeCursor();

		//Recuperation des commentaires
		
		while($comment = $comments->fetch())
		{
	?>

	<p><strong><?=htmlspecialchars($comment['author']);?></strong> le <?= $comment['comment_date_fr'];?></p>
	<p><?= nl2br(htmlspecialchars($comment['comment']));?></p>
	<hr>
	<?
	}//Fin de la boucle des commentaires
	//$req->closeCursor();
	?>
</body>
</html>