<?php
	class category{
		
		private $id_category=null;
		private $types=null;
		
		
		
		
		function __construct($id_category, $types){

			$this->id_category=$id_category;
			$this->types=$types;
			
		}
		
		function getId_category(){
			return $this->id_category;
		}
		function gettypes(){
			return $this->types;
		}
		
		
		function setTypes(string $types){
			$this->types=$types;
		}
		
		
		
	}


?>