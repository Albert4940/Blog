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
		}
		elseif ($_GET['action'] == 'addComment'){
	    	if(isset($_GET['id']) && $_GET['id']>0){
	    		if (!empty($_POST['author']) && !empty($_POST['comment'])) {
	    			# code...
	    			addComment($_GET['id'],$_POST['author'],$_POST['comment']);
				}
				else{
	    			throw new Exception("Erreur: tous les champs ne sont pas remplis !");
	    		}
			}
			else{
	    		throw new Exception ("Erreur: aucun identifiant de billet envoye");
			}
		
		}

		elseif($_GET['action']== 'commentView'){
			if(isset($_GET['id']) && $_GET['id']>0){
				if(isset($_GET['postId']) && $_GET['postId']>0){
					commentView();
				}
			}
		}
		elseif($_GET['action'] == 'updateComment'){
			if(isset($_GET['id']) && $_GET['id']>0){
				if(!empty($_POST['comment'])){
					updateComment($_GET['id'],$_POST['comment']);
				}
				else{
	    			throw new Exception("Erreur: tous les champs ne sont pas remplis !");
	    		}
			}
			else{
	    		throw new Exception ("Erreur: aucun identifiant de commentaire envoye");
	    	}
		}
	}
	else {
	    listPosts();
	}
	}catch(Exception $e){
		$errorMessage = $e->getMessage();
		errorView($errorMessage);
	}