<?php
	require("connexion.php");
	
	

	function getPosts(){
		$bdd = connexion();
		$req = $bdd->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
		return $req;
	}