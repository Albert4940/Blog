<?php

	require('model.php');
	$posts = getPosts();
	
	if(isset($_GET['id']) && $_GET['id']>0)
	{
		$post = getPost($_GET['id']);
		$comments = getComments($_GET['id']);
		require("postView.php");
	}else
	{
		echo 'Erreur : Aucun identifiant de billet envoye ';
	}
	
	if(!isset($_GET['id']))
		require('indexView.php');