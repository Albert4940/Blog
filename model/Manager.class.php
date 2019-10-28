<?php  
//Connexion a la base de donnees
class Manager{
	protected function dbConnect(){
		try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','');
	
			}catch(Exception $e)
			{
				die('Erreur :'.$e->getMessage());
			}
			return $bdd;
		}
}
		
