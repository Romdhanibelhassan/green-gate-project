<?php
    include_once '../Model/Compte.php';
    include_once '../Controller/CompteC.php';
    
    $error = "";
    session_start();
    $hash="";
$pass="";
    // create adherent
    $compte = null;
    $message = "";
    // create an instance of the controller
    $compteC = new CompteC();
    if (
      isset($_POST["IDcompte"]) &&
        isset($_POST["telephone"]) &&
		isset($_POST["nom"]) &&		
        isset($_POST["prenom"]) &&
		isset($_POST["mail"]) && 
        isset($_POST["password"])
        
    ) {
        if (
          !empty($_POST["IDcompte"]) && 
            !empty($_POST["telephone"]) && 
			!empty($_POST['nom']) &&
            !empty($_POST["prenom"]) && 
			!empty($_POST["mail"]) && 
            !empty($_POST["password"])
        ) { if (isset($_POST['submit'])) {

         
            $token = strtolower($_POST['token']);
    
            // validate captcha code 		
            if (isset($_SESSION['captcha_token']) && $_SESSION['captcha_token'] == $token) {
                $pass=$_POST["password"];
                $hash=password_hash($pass,PASSWORD_DEFAULT);
                $compte = new Compte(
                    $_POST['IDcompte'],
                    $_POST['telephone'],
                    $_POST['nom'],
                    $_POST['prenom'], 
                    $_POST['mail'],
                  '7',
                  $hash
                );
                $compteC->ajoutercompte($compte);
                header('Location:login.php');

            } else {
                $message="error CAPTCHA code";
            }
            
        }
            
            
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Create your account</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
           
  

        <?php echo $message; ?>
 
  
    
            <script  src="../js/controle.js"></script>
				<form name="inscritform" action="" method="POST" class="tm-signup-form row"  onsubmit="return verif()">
                <label for="prenom"></label> <input class="text" type="text" name="prenom" id="prenom" maxlength="20" placeholder="First name" required="">
               <label for="nom"></label> <input class="text" type="text" name="nom" id="nom" maxlength="20" placeholder="Last name" required="">
            

                <label for="mail"></label> <input class="text " type="text" name="mail" id="mail" placeholder="Email" required="">
					<label for="password"></label>  <input class="text"    type="password" name="password" id="password" placeholder="Password(secured)" required="">
                   <label for="categorie"></label> <input class="text w3lpass" type="hidden" name="categorie" id="categorie" value="" placeholder="Categorie"  >
                    <label for="telephone"></label>  <input class="text w3lpass" type="text" name="telephone" id="telephone" maxlength="20" placeholder="Phone number" required="">
                    <label for="IDcompte"></label> <input type="hidden" name="IDcompte" id="IDcompte" maxlength="20" value="NULL"/>

                    <div class="container">
                    <div class="row">
                        <div class="col-sm">
									
								</div>

                                <div class="col-sm">
									<img src="captcha/image.php?12325" alt="CAPTCHA" id="image-captcha">
                                 
                                   
									<a href="#" id="refresh-captcha" class="align-middle" title="refresh"><i class="fa fa-refresh"  style="font-size:20px;color:red"></i> </i></a>
                                   
                                  
                            </div>
                            <input type="text"  name="token" id="token" placeholder="Captcha"  maxlength="6" size="6">
                        </div>
					<input type="submit" name="submit" id="submit" value="SIGNUP">
                    <input type="reset" value="CANCEL">
                    </div>
				</form>
				<p>Already have an Account? <a href="login.php"> Login Now!</a></p>
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
		</ul>
	</div>


	<script type="text/javascript">
		var refreshButton = document.getElementById("refresh-captcha");
		var captchaImage = document.getElementById("image-captcha");

		refreshButton.onclick = function(event) {
			event.preventDefault();
			captchaImage.src = 'captcha/image.php?' + Date.now();
		}
	</script>

</body>
</html>
