<?php
    require_once("tool/connexion.php");
    class PostManager{

        function getPosts(){
            $db = dbConnect();
            $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
            return $req;
        }
    
        function getPost($postId)
        {
            $db = dbConnect();
            $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts where id = ?');
            $req->execute(array($postId));
            $post = $req->fetch();
    
            return $post;
        }
    
    }