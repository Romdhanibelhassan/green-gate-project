<?php
	include '../Controller/CategoryC.php';
	$categoryC=new CategoryC();
	$categoryC->supprimercategory($_GET["id_category"]);
	header('Location:afficherListeCategory.php');
?>