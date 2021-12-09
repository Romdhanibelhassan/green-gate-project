<?php
	include '../config.php';
	include_once '../Model/Compte.php';
	class CompteC {
		function affichercomptes(){
			$sql="SELECT * FROM compte";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimercompte($IDcompte){
	
			 $sql="DELETE FROM compte WHERE IDcompte=:IDcompte";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':IDcompte', $IDcompte);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajoutercompte($compte){
			$sql="INSERT INTO compte (IDcompte,telephone, Nom, Prenom, mail, categorie,password) 
			VALUES (:IDcompte,:telephone,:Nom,:Prenom, :mail,:categorie, :password)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'IDcompte'=>$compte->getIDcompte(),
					'telephone' => $compte->gettelephone(),
					'Nom' => $compte->getNom(),
					'Prenom' => $compte->getPrenom(),
					'mail' => $compte->getmail(),
					'categorie' => $compte->getcategorie(),
					'password' => $compte->getpassword()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recuperercompte($IDcompte){
			$sql="SELECT * from compte where IDcompte=$IDcompte";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$compte=$query->fetch();
				return $compte;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifiercompte($compte, $IDcompte){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE compte SET 
				    	telephone=:telephone,
						Nom= :Nom, 
						Prenom= :Prenom, 
						mail= :mail, 
						categorie= :categorie, 
						password= :password
					WHERE IDcompte= :IDcompte'
				);
				$query->execute([
					'telephone' => $compte->gettelephone(),
					'Nom' => $compte->getNom(),
					'Prenom' => $compte->getPrenom(),
					'mail' => $compte->getmail(),
					'categorie' => $compte->getcategorie(),
					'password' => $compte->getpassword(),
					'IDcompte' => $IDcompte
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recuperercat($mail)
		{
            $sql="SELECT categorie FROM compte WHERE mail='" . $mail . "' ";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();
                $count=$query->rowCount();
                 
                    $x=$query->fetch();
				
                    $message = $x['categorie'];               
            }
            catch (Exception $e){
                    $message= " ".$e->getMessage();
            }
          return $message;
        }
		function verifierm($mail)
		{
            $sql="SELECT mail FROM compte WHERE mail='" . $mail . "' ";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();
                $count=$query->rowCount();
                if($count==0)
				 {
                    $message = "mail introuvable";
                } else {
                    $x=$query->fetch();
				
                    $message = $x['mail'];
					
                }
            }
            catch (Exception $e){
                    $message= " ".$e->getMessage();
            }
          return $message;
        }
	
		function recuperermdp($mail)
		{
            $sql="SELECT * FROM compte WHERE mail='" . $mail . "' ";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();
                $count=$query->rowCount();
                if($count==0)
				 {
                    $message = "Ce mail est incorrect";
                } else {
                    $x=$query->fetch();
				
                    $message = $x['password'];
					
                }
            }
            catch (Exception $e){
                    $message= " ".$e->getMessage();
            }
          return $message;
        }
		function recupererC($mail)
		{
			 $sql = 'SELECT * from compte WHERE mail="'.$mail.'"';
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
			   
				
					$compte=$query->fetch();
					return $compte;
				  
			}
			catch (Exception $e){
					$message= " ".$e->getMessage();
			}
        }

	}
?>