<?php
	//include '../config.php';
	include_once '../Model/category.php';


	class categoryC {
		function affichercategory(){
			$sql="SELECT * FROM category";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimercategory($id_category){
			$sql="DELETE FROM category WHERE id_category=:id_category";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_category', $id_category);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajoutercategory($category){
			$sql="INSERT INTO category (id_category,types) 
			VALUES (:id_category,:types)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id_category' => $category->getId_category(),
					'types' => $category->getTypes()
					
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recuperercategory($id_category){
			$sql='SELECT * from category where id_category="'.$id_category.'"';
 		$db = config::getConnexion();
		try{
				$query=$db->prepare($sql);
				$query->execute();

				$category=$query->fetch();
				return $category;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifiercategory($category,$id_category){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE category SET 
						types =:types
						
				
					WHERE id_category= :id_category'
				);
				$query->execute([
					'types'=>$category->getTypes(),
					
		            'id_category' => $id_category
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

		function afficherProduits($id_category)
		{
            try {
				$db = config::getConnexion();
	              $querry=$db->prepare(
		          'SELECT * FROM produit where category =id'
	              );
	                 $querry->execute(['id'=>$id_category ]);
	                 return $querry->fetchAll();
	

                      }
					  catch (PDOException $e) {
						$e->getMessage();
					}
				}
		

		                        }

?>