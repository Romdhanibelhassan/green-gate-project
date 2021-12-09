<?php
session_start();
include_once '../Model/Compte.php';
include_once '../Controller/CompteC.php';

$message="";
$compteC = new CompteC();
if (isset($_POST["mail"]) )

{
	if (!empty($_POST["mail"]) )
        {  
			$message=$compteC->verifierm($_POST["mail"]);
			$_SESSION['mai']=$_POST["mail"];
			if($message!='mail introuvable')
			{
        mail($_POST["mail"],"Récuperation de votre mot de passe Green Gate","Nous avons reçu une demande de réinitialisation de votre mot de passe Green Gate. 
		Entrez le code de réinitialisation du mot de passe suivant : http://localhost/green/Views/Sasirnouvemdp.php ");	
       echo "nous avons vous envoyé un mail de verification ";            			
		}
        else
		{
            $message="mail introuvable";
        }
	}
    else {
        $message = "Missing information";
	}
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
<title>Log in</title>
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
<style>
.button {
  background-color:#70db70;
  border: none;
  color: white;
  padding: 9px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 2px 2px;
  cursor: pointer;
}
</style>

</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
	<center >
		<img src="../img/gg.png">
		
	</center >

		<h1>Récupérer votre mot de passe</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
            
				<form  action="" method="POST" class="tm-signup-form row"  >             
                <?php if($message!=""){echo $message; }?>
                <label for="mail"> </label> <input class="text " type="text" name="mail" id="mail" placeholder="Your Email address"  required="">
				<label for="code_sent"></label> <input class="text " type="hidden" name="code_sent" id="code_sent" value="<?php echo $code_sent; ?>">
				<div class="wthree-text">
					
					<input type="submit" value="Reset your password">

                   <button  type="reset"  class="button"> CANCEL </button>
                    </div>
				</form>
								
			</div>
		</div>
	
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		
			
		</ul>
	</div>
</body>
</html>