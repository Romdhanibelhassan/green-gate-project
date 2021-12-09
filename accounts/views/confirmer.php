<?php
session_start();
$msg="";
if ((isset($_POST["code"]) ) &&
isset($_POST["code_sent"]))

{
    if( (!empty($_POST["code"]))&& 
    !empty($_POST["code_sent"]))
        {  
            header('Location:Sasirnouvemdp.php');    
        if($_POST["code"]==$_POST["code_sent"])
		{
        header('Location:Sasirnouvemdp.php');                			
		}
        else
		{
           echo $_POST["code_sent"], $_POST["code"];
        }
	}
    else
        $msg = "Missing information";
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

		<h1> Veiller entrer le code recu </h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
            
				<form  action="" method="POST" class="tm-signup-form row"  >             
                <?php if($msg!=""){echo $msg; }?>
                <label for="code"> </label> <input class="text " type="number" name="code" id="code" placeholder="Code"  required="">
				
				<div class="wthree-text">
					<input type="submit" value="Récupérer le mot de passe">

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