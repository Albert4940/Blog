<!DOCTYPE html>
<html>
<head>
	<title>Mon blog</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>
	<h1>Mon super Blog</h1>
	<p>Derniers billets du blog: </p>

	<?php
		while($data = $posts->fetch())
		{
	?>
	
	<div class="news">
		<h3>
			<?=htmlspecialchars($data['title']);?>
			<em>le <?=$data['creation_date_fr'];?></em>
		</h3>
		<p>
			<?=nl2br(htmlspecialchars($data['content']));
			?>
			<br/>
			<em><a href="index.php?id=<?php echo $data['id'];?>&amp;action=post">commentaires</a></em>
		</p>
	</div>
	<?php
		}
		$posts->closeCursor();
	?>
</body>
</html>