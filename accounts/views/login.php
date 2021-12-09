<?php
session_start();
include_once '../Model/Compte.php';
include_once '../Controller/CompteC.php';
$message="";
$categorie="";
$mdp="";
$compteC = new CompteC();
if (isset($_POST["mail"]) &&
    isset($_POST["password"]) )
	 {
    if (!empty($_POST["mail"]) &&
        !empty($_POST["password"]) )
        {  
			$mdp=$compteC->recuperermdp($_POST["mail"] );
			if($mdp!='Ce mail est incorrect')
		    {
		
			if(password_verify($_POST["password"],$mdp))
			{				  	   
			
				$categorie=$compteC->recuperercat($_POST["mail"]);
				   switch($categorie)
				   {
					   case 1: 
							$_SESSION['e'] = $_POST["mail"];
						header('location:afficherListeComptes.php');
					   break;
					  
					   case 2:
						$_SESSION['e'] = $_POST["mail"];
						header('Location:products.php');
					   break;
					   case 7:  
				    	$_SESSION['e'] = $_POST["mail"];
						header('Location:welcomeclient.php');
					   break;
				   }				   			   
			   }
		   else
		   {
			   echo "mot de passse incorrect"; 
			}
			              			
		}
        else
		{
            $mdp="Ce mail est incorrect";
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
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
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
<style>
form i {
    margin-right: 30px;
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

		<h1>Welcome to green gate </h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
            
				<form  action="" method="POST" class="tm-signup-form row"  >
                <?php if($message!=""){echo $message; }?>
                
                <label for="mail"> </label>    <span class="input-group-text"><i class='fas fa-user'></i></span><input class="text " type="text" name="mail" id="mail" placeholder="Email address" pattern=".+@gmail\.com" required="">
				
				<label for="password"> <span class="input-group-text"><i class='fas fa-key'></i></span></label><p>   <input class="text" type="password" name="password" id="password" placeholder="Password"  required="">	
			
                 <i class="bi bi-eye-slash" id="togglePassword"></i></p>
        	
				<div class="input-group-append">
					
               
            </div>		
				<p> <a href="recuperermdp.php"> Forgot your password ?</a></p>
				<div class="wthree-text">
					<input type="submit" value="LOG IN">

                   <button  type="reset"  class="button"> CANCEL </button>
                    </div>
				</form>
				
				<p>Don't have an account yet ? <a href="signUp.php"> Create your account !</a></p>
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
	<script src="../js/app.js"></script>
</body>
</html>