<?php
	include '../Controller/ProduitC.php';
	$produitC=new ProduitC();
	$produitC->supprimerproduit($_GET["id_produit"]);
	header('Location:afficherListeProduit.php');
?>