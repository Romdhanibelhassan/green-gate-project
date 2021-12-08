<?php
	include '../config.php';
	include_once '../Model/Produit.php';
	include '../Controller/CategoryC.php';
	class ProduitC {
		function afficherproduit(){
			$sql="SELECT * FROM produit";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerproduit($id_produit){
			$sql="DELETE FROM produit WHERE id_produit=:id_produit";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_produit', $id_produit);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterproduit($produit){
			$sql="INSERT INTO produit (id_produit,nom,images, prix, quantite, descriptions,category) 
			VALUES (:id_produit,:nom,:images,:prix, :quantite,:descriptions,:category)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id_produit' => $produit->getId_produit(),
					'nom' => $produit->getNom(),
					'images' => $produit->getImages(),
					'prix' => $produit->getPrix(),
					'quantite' => $produit->getQuantite(),
					'descriptions' => $produit->getDescriptions(),
					'category'=>$produit->getCategory()
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererproduit($id_produit){
			$sql='SELECT * from produit where id_produit="'.$id_produit.'"';
 		$db = config::getConnexion();
		try{
				$query=$db->prepare($sql);
				$query->execute();

				$produit=$query->fetch();
				return $produit;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function recuperernomproduit($nom){
			$sql='SELECT * from produit where nom="'.$nom.'"';
 		$db = config::getConnexion();
		try{
				$query=$db->prepare($sql);
				$query->execute();

				$produit=$query->fetch();
				return $produit;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierproduit($produit,$id_produit){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE produit SET 
						nom =:nom,
						images =:images,
						prix= :prix, 
						quantite= :quantite, 
						descriptions= :descriptions,
						category=:category
				
					WHERE id_produit= :id_produit'
				);
				$query->execute([
					'nom'=>$produit->getNom(),
					'images'=>$produit->getImages(),
					'prix' => $produit->getPrix(),
					'quantite' => $produit->getQuantite(),
					'descriptions' => $produit->getDescriptions(),
					'category' => $produit->getCategory(),
		            'id_produit' => $id_produit
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function afficherproduits($id_category){
			$sql='SELECT * from produit where category="'.$id_category.'" ORDER BY prix ASC';
 		$db = config::getConnexion();
		try{
			$list= $db->query($sql);
			return $list;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
	}
?>