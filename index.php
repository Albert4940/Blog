<?php
require('controller/controller.php');

	try{
		if (isset($_GET['action'])) {
	    if ($_GET['action'] == 'listPosts') {

	        listPosts();
	    }
	    elseif ($_GET['action'] == 'post') {
	        if (isset($_GET['id']) && $_GET['id'] > 0) {
	            post();
	        }
	        else {
	            throw new Exception('Erreur : aucun identifiant de billet envoyé');
	        }
	    }elseif ($_GET['action'] == 'addComment'){
	    	if(isset($_GET['id']) && $_GET['id']>0){
	    		if (!empty($_POST['author']) && !empty($_POST['comment'])) {
	    			# code...
	    			addComment($_GET['id'],$_POST['author'],$_POST['comment']);
	    		}else{
	    			echo "Erreur: tous les champs ne sont pas remplis !";
	    		}
	    	}else{
	    		throw new Exception ("Erreur: aucun identifiant de billet envoye");
	    	}
	    }
	}
	else {
	    listPosts();
	}
	}catch(Exception $e){
		$errorMessage = $e->getMessage();
		require('view/errorView.php');
	}