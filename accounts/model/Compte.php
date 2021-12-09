<?php
	class Compte{
		private $IDcompte=null;
		private $telephone=null;
		private $nom=null;
		private $prenom=null;
		private $mail=null;
		private $categorie=null;
		private $password;
		
		function __construct($IDcompte,$telephone, $nom, $prenom, $mail, $categorie, $password){
			$this->IDcompte=$IDcompte;
			$this->telephone=$telephone;
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->mail=$mail;
			$this->categorie=$categorie;
			$this->password=$password;
		}
		function getIDcompte(){			
			return $this->IDcompte;
		}
		function gettelephone(){
			return $this->telephone;
		}
		function getNom(){
			return $this->nom;
		}
		function getPrenom(){
			return $this->prenom;
		}
		function getmail(){
			return $this->mail;
		}
		function getcategorie(){
			return $this->categorie;
		}
		function getpassword(){
			//$hash=password_hash($this->password,PASSWORD_DEFAULT);
			//$hash=trim($hash);
			return $this->password;
		}
		function setNom(string $nom){
			$this->nom=$nom;
		}
		function setPrenom(string $prenom){
			$this->prenom=$prenom;
		}
		function setAdresse(string $mail){
			$this->mail=$mail;
		}
		function setcategorie(string $categorie){
			$this->$categorie=$categorie;
		}
		function setpassword(string $password){
			$this->password=$password;
		}
		function settelephone(string $telephone){
			$this->telephone=$telephone;
		}
		
	}


?>