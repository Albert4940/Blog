<?php
require_once('model/PostManager.class.php');
require_once('model/CommentManager.class.php');

	function listPosts(){
		$postManager = new \Albert4940\Blog\model\PostManager();
		$posts = $postManager->getPosts();
	
		require('view/listPostsView.php');
	}

	function post(){
		$postManager = new \Albert4940\Blog\model\PostManager();
		$commentManager = new \Albert4940\Blog\model\CommentManager();

		$post = $postManager->getPost($_GET['id']);
		$comments = $commentManager->getComments($_GET['id']);
		require("view/postView.php");
	}

	function addComment($postId, $author, $comment){
		$commentManager = new \Albert4940\Blog\model\CommentManager();

		$affectedLines = $commentManager->postComment($postId,$author,$comment);

		if($affectedLines == false){
			throw new Exception('Impossible d\'ajouter un commentaire !');
		}else{
			header('Location: index.php?action=post&id='.$postId);
		}
	}

	function commentView(){
		/*$commentManager = new \Albert4940\Blog\model\CommentManager();
		$comment = $commentManager->getComment($commentId);
		$comment = $comment->fetch();*/
		//header('Location: view/updatePostView.php?id='.$postId);
		require("view/updatePostView.php");
	}

	function updateComment($commentId, $comment){
		$commentManager = new \Albert4940\Blog\model\CommentManager();

		$affectedLine = $commentManager->updateComment($commentId,$comment);

		if($affectedLine == false){
			throw new Exception('Impossible de modifier un commentaire !');
		}
		else{
			header('Location: index.php?action=post&id='.$_GET['postId']);
		}
	}

	function errorView($messageError){
		$message = $messageError;
		require('view/errorView.php');
	}