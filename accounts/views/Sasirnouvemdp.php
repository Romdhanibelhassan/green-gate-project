
<?php
    include_once '../Model/Compte.php';
    include_once '../Controller/CompteC.php';

    $error = "";
    $hash="";
    $pass="";
    // create adherent
    $compte = null;
    session_start();
    // create an instance of the controller
    $compteC = new CompteC();
    if (
        isset($_POST["IDcompte"]) &&
        isset($_POST["telephone"]) &&
	    	isset($_POST["nom"]) &&		
        isset($_POST["prenom"]) &&
	     	isset($_POST["mail"]) && 
        isset($_POST["categorie"]) && 
        isset($_POST["password"])
    ) {
        if (
            !empty($_POST["IDcompte"]) && 
            !empty($_POST["telephone"]) && 
		      	!empty($_POST["nom"]) &&
            !empty($_POST["prenom"]) && 
		      	!empty($_POST["mail"]) && 
            !empty($_POST["categorie"]) && 
            !empty($_POST["password"])
        ) {
            $pass=$_POST["password"];
            $hash=password_hash($pass,PASSWORD_DEFAULT);
            $compte = new Compte(
               $_POST['IDcompte'],
                $_POST['telephone'],
			        	$_POST['nom'],
                $_POST['prenom'], 
			        	$_POST['mail'],
                $_POST['categorie'],
                $hash
            );
            $compteC->modifiercompte($compte, $_POST["IDcompte"]);
            header('Location:login.php');
        }
        else
            $error = "Missing information";
    }    
?>
<!DOCTYPE html>
<html lang="en" >
<head>
<title>Create account</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link rel="stylesheet" href="../css/style.css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Modifier mdp</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
            <script  src="../js/controle.js"></script>
            <?php
       
       if(empty($_SESSION['mai']))
       {
           // Si inexistante ou nulle, on redirige vers le formulaire de login
          
           header('Location:login.php');
          }
          else {		
       $compte = $compteC->recupererC($_SESSION['mai']);
       
   ?>
				<form name="inscritform" action="" method="POST" class="tm-signup-form row"  onsubmit="return verif()">
                <label for="password"></label>  <input class="text"    type="password" name="password" id="password">
                <label for="prenom"></label> <input class="text" type="hidden" name="prenom" id="prenom" maxlength="20"  value="<?php echo $compte['prenom']; ?>">
               <label for="nom"></label> <input class="text" type="hidden" name="nom" id="nom" maxlength="20"  value="<?php echo $compte['nom']; ?>">

                <label for="mail"></label> <input class="text " type="hidden" name="mail" id="mail"  value="<?php echo $compte['mail']; ?>">
					
                    <label for="categorie"></label> <input class="text w3lpass" type="hidden" name="categorie" id="categorie"  value="<?php echo $compte['categorie']; ?>" >
                    <label for="telephone"></label>  <input class="text w3lpass" type="hidden" name="telephone" id="telephone" maxlength="20"   value="<?php echo $compte['telephone']; ?>">
                    <label for="IDcompte"></label> <input type="hidden" name="IDcompte" id="IDcompte" maxlength="20" value="<?php echo $compte['IDcompte']; ?>"/>
					<div class="wthree-text">
						
                        </div>
                        <div class="wthree-text">
					<input type="submit" value="Change password">
                   
                    <input type="reset" value="CANCEL">
                    </div>
				</form>
              <?php }
              ?> 
			</div>
		</div>
	</div>
</body>
</html>
