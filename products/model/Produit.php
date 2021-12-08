<?php
	class Produit{
		
		private $id_produit=null;
		private $nom=null;
		private $images=null;
		private $prix=null;
		private $quantite=null;
		private $descriptions=null;
		private $category=null;
		
		
		
		function __construct($id_produit, $nom, $images, $prix, $quantite, $descriptions,$category){

			$this->id_produit=$id_produit;
			$this->nom=$nom;
			$this->images=$images;
			$this->prix=$prix;
			$this->quantite=$quantite;
			$this->descriptions=$descriptions;
			$this->category=$category;
		}
		
		function getId_produit(){
			return $this->id_produit;
		}
		function getNom(){
			return $this->nom;
		}
		function getImages(){
			return $this->images;
		}
		function getPrix(){
			return $this->prix;
		}
		function getQuantite(){
			return $this->quantite;
		}
		function getDescriptions(){
			return $this->descriptions;
		}
		function getCategory(){
			return $this->category;
		}
		
		function setName(string $name){
			$this->name=$name;
		}
		function setImages(string $images){
			$this->images=$images;
		}
		function setPrix(string $prix){
			$this->prix=$prix;
		}
		function setQuantite(string $quantite){
			$this->quantite=$quantite;
		}
		function setDescriptions(string $descriptions){
			$this->description=$description;
		}
		function setcategory(string $category){
			$this->category=$category;
		}
		
		
	}


?>