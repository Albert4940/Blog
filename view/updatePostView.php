<!DOCTYPE html>
<html>
    <head></head>
    <body>
    <h1>MODIFIER COMMENTAIRE</h1>
    <form action="index.php?action=updateComment&amp;id=<?= $_GET['id']?>&amp;postId=<?= $_GET['postId']?>" method="post">
	
		<div>
			<label for="comment"> Commentaire</label><br>
			<textarea id="comment" name="comment" ></textarea>
		</div>
		<input type="submit" name="">
	</form>
    </body>
</html> 