<?php
	include '../Controller/CompteC.php';
	$compteC=new CompteC();
	$compteC->supprimercompte($_GET["IDcompte"]);
	header('Location:afficherListeComptes.php');
?>