<?php 
namespace App;
use PDO;
class databasehelper
{
	private $serveur;
	private $login;
	private $pass;
	private $dbname;
	public $db;
	
	function __construct($dbname="contact",$login="root",$pass="",$serveur="localhost"){
             $this->serveur=$dbname;
             $this->login=$login;
             $this->pass=$pass;
             $this->dbname=$serveur;
	}

	public function getConnexion(){
        try {
            if ($this->db=== null) {
                $pdo=new PDO("mysql:host=localhost;dbname=contact;charset=utf8", 'root', '');
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->db=$pdo;
				return $this->db;
            }
             
        } catch (PDOException $e) {
            echo'Erreur de connexion à la base de données !' .$e->getMessage();
        }
      
	}
	
	public function mySelect($id){
		$requser = $this->db->prepare('SELECT * FROM users WHERE id = ?');
		$requser->execute([$id]);
		$userinfo = $requser->fetch();
		$rs= $requser->rowCount();
		if($rs==1){
            return $userinfo;
		}else {
			 header('location:index.php');
			 exit();
		}
	}
	
	public function insertion($nom,$prenom,$email,$pass){
		$sql= $this->db->prepare("SELECT *FROM users where email = ?");
		$sql->execute(array($email));
		$rs= $sql->rowCount();
		if ($rs== 0) {	  
			$rqt = "INSERT INTO users (nom,prenom,email,pass) VALUES (?,?,?,?)";
			$requete= $this->db->prepare($rqt);
			$result= $requete->execute([$nom,$prenom, $email, $pass]);
			header('location:connexion.php');
		  return $result;
		}
  }


	public function login($email, $pass){
		$sql= $this->db->prepare("SELECT *FROM users where email = ?");
		$sql->execute([$email]);
		$rs= $sql->rowCount();
		  if ($rs== 1) {
			$userinfo =$sql->fetch();
			$password=$userinfo ['pass'];
			  if(password_verify($pass,$password)){
			    $_SESSION['nom'] = $userinfo['nom'];
			    $_SESSION['prenom'] = $userinfo['prenom'];
				$_SESSION['email'] = $userinfo['email'];
				$_SESSION['id'] = $userinfo['id'];
				header("Location: profil.php?id=".$_SESSION['id']);
				
			  }
			
			  
		    }else {
			  echo"Mail ou mot de passe incorrecte !";
			  header('location:connexion.php');
			}
			
		}
		

		public function insertContacts($nom,$prenom,$tel,$image,$users_id){
			$sql= $this->db->prepare("SELECT *FROM contacts where tel = ?");
			$sql->execute(array($tel));
			$rs= $sql->rowCount();
			if ($rs== 0) {	  
				$rqt = "INSERT INTO contacts (nom,prenom,tel,photo,users_id) VALUES (?,?,?,?,?)";
				$requete= $this->db->prepare($rqt);
				$result= $requete->execute([$nom,$prenom, $tel, $image,$users_id]);
			  return header('location:liste.php');
			}else{
				echo"Ce numéro de téléphone existe déja !";  
			}
	  }

	  public function search(){
	
		 if (isset($_POST['donnee']))
		 {
		  $donnee = strtolower($_POST['donnee']);
		  $select_terme = $this->db->prepare("SELECT nom, prenom,tel,photo FROM contacts WHERE nom LIKE ? OR prenom LIKE ? OR tel LIKE ? OR photo LIKE ?");
		  $select_terme->execute(["%".$donnee."%", "%".$donnee."%","%".$donnee."%","%".$donnee."%"]);
		
		  while($terme_trouve = $select_terme->fetch())
		  {
		
		  $_SESSION['noms']=$terme_trouve['nom'];
		  $_SESSION['prenoms']=$terme_trouve['prenom'];
		  $_SESSION['tels']=$terme_trouve['tel'];
		  $_SESSION['images']=$terme_trouve['photo'];
		  $select_terme->closeCursor();
		  header('location:search.php');
		  exit();
		 }
		 }else
		 {
		  $message = "Vous devez entrer votre requete dans la barre de recherche";
		 }
	}

}
 ?>