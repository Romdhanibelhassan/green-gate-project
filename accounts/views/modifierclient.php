
<?php
    include_once '../Model/Compte.php';
    include_once '../Controller/CompteC.php';
    session_start();
    $error = "";
  
    // create adherent
    $compte = null;

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
            $compte = new Compte(
               $_POST['IDcompte'],
                $_POST['telephone'],
			        	$_POST['nom'],
                $_POST['prenom'], 
			        	$_POST['mail'],
                $_POST['categorie'],
                $_POST['password']
            );
            $compteC->modifiercompte($compte, $_POST["IDcompte"]);
            header('Location:welcomeclient.php');
        }
        else
            $error = "Missing information";
    }    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
        body.dark-theme {
            background-color: #000000;
            color: #FFFFFF;
        }

        .dark-theme .jumbotron {
            background-color: rgb(39, 39, 39);
        }

        .dark-theme .btn {
            background-color: #dd491c;
        }
    </style>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>profile with data and skills - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
  <meta charset="utf-8">
    

    <link rel="apple-touch-icon" href="../img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/templatemo.css">
    <link rel="stylesheet" href="../css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link href='https://css.gg/dark-mode.css' rel='stylesheet'>
</head>
<body>
    
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script>
        var body = document.getElementsByTagName('body')[0];
        var dark_theme_class = 'dark-theme';
        var theme = getCookie('theme');

        if(theme != '') {
            body.classList.add(theme);
        }

        document.addEventListener('DOMContentLoaded', function () {
            $('#theme-toggle').on('click', function () {
        
                if (body.classList.contains(dark_theme_class)) {
                    body.classList.remove(dark_theme_class);
                    $('#mode').text('Light Mode')
                    setCookie('theme', 'light');
                }
                else {
                
                    $('#mode').text('Dark Mode')
                    body.classList.add(dark_theme_class);
                    setCookie('theme', 'dark-theme');
                }

            });
        });

        // enregistrement du theme dans le cookie
        function setCookie(name, value) {
            var d = new Date();
            d.setTime(d.getTime() + (365*24*60*60*1000));
            var expires = "expires=" + d.toUTCString();
            console.log(expires)
            document.cookie = name + "=" + value + ";" + expires + ";path=/";
            console.log(document.cookie)
        }

        // methode de recuperation du theme dans le cookie
        function getCookie(cname) {
            var theme = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for(var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(theme) == 0) {
                    return c.substring(theme.length, c.length);
                }
            }
            return "";
        }
    </script>

  <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
    <div class="container text-light">
        <div class="w-100 d-flex justify-content-between">
            <div>
                <i class="fa fa-envelope mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="greengate@esprit.tn">greengate@esprit.tn</a>
                <i class="fa fa-phone mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="tel:+216-54-200-300">+216-54-200-300</a>
              
            </div>
           
            <div>
                <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
            </div>
        </div>
    </div>
</nav>
<!-- Close Top Nav -->

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
            <img class="img-fluid" src="../img/gg.png" alt="">
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="welcomeclient.php">Home</a>
                        </li>
                        <a class="nav-link" href="shop.html">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Our projects</a>
                    </li>
                    
                </ul>
            </div>
  

            <div class="navbar align-self-center d-flex">
                <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                        <div class="input-group-text">
                            <i class="fa fa-fw fa-search"></i>
                        </div>
                    </div>
                </div>
                <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                    <i class="fa fa-fw fa-search text-dark mr-2"></i>
                </a>
                <a class="nav-icon position-relative text-decoration-none" href="#">
                    <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
                </a>
                <a class="nav-icon position-relative text-decoration-none" >
                   
                   
                <i class="fa fa-fw fa-user text-dark mr-3"></i>
                   <select name="forma" onchange="location = this.value;" class="nav-icon position-relative text-decoration-none" >
     <option value="fa fa-fw fa-user text-dark mr-3"> <?php   echo $_SESSION['e']; ?> </option>
<option  value="modifierclient.php" > Parametres</option>
<option   value="Contact.php">Voir historique achat</option>
<option   value="deconnexion.php">Déconnexion</option>
</select> 
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
                </a>
            </div>
            </div>

           <!-- <button onclick="window.open('deconnexionclient.php','_self')" >Se déconnecter</button> -->

    </div>
</nav>
<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
          <?php
       
          if(empty($_SESSION['e']))
          {
              // Si inexistante ou nulle, on redirige vers le formulaire de login
              header('Location:login.php');
             }
             else {		
          $compte = $compteC->recupererC($_SESSION['e']);
          
      ?>
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $compte['prenom']; ?><?php echo $compte['nom']; ?></h4>
                     
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
              <ul class="list-group list-group-flush">
                      
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" >
                          <h6 class="mb-0" ><a href="# ">Voir historique achats</a></h6>
                          
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                          <h6 class="mb-0"><a href="# ">Envoyer une réclamation</a></h6>
                      
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                          <h6 class="mb-0"><a href="# ">Evènements participés</a></h6>
                      
                      </li>

                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                     
                      <h6 class="mb-0">  <a id="theme-toggle" href="#" >  <i class="gg-dark-mode"> </i> Switch to dark mode</a></h6>
                     </li>

                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0"><a href="deconnexion.php ">Déconnexion</a></h6>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0"><a href="supprimercompte.php" onclick="window.open('supprimercompte.php?IDcompte=<?php echo $compte['IDcompte']; ?>','_self')"> Supprimer mon compte</a></h6>
                        
                      </li>
                  </ul>
              </div>
            </div>
            <form name="inscritform" action="" method="POST" class="tm-signup-form row"  >
            <div class="col-md-10">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <label for="prenom">Prenom</label> <input class="text" type="text" name="prenom" id="prenom" maxlength="20"  value="<?php echo $compte['prenom']; ?>">
                  
                  </div>
                  <hr>
                  <div class="row">
                  <label for="nom">Nom</label> <input class="text" type="text" name="nom" id="nom" maxlength="20"  value="<?php echo $compte['nom']; ?>">
                  </div>
                  <hr>
                  <div class="row">
                    <label for="mail">Mail</label> <input class="text " type="text" name="mail" id="mail"  value="<?php echo $compte['mail']; ?>">
                  </div>
                  <hr>
                  <div class="row">
                    <label for="telephone">Telephone</label>  <input class="text w3lpass" type="text" name="telephone" id="telephone" maxlength="20"   value="<?php echo $compte['telephone']; ?>">
                  </div>
                  <hr>
                  <div class="row">
                    <label for="IDcompte"></label> <input type="hidden" name="IDcompte" id="IDcompte" maxlength="20" value="<?php echo $compte['IDcompte']; ?>"/>
                 
                    <label for="password"></label>  <input class="text"    type="hidden" name="password" id="password" value="<?php echo $compte['password'];?>">
                    <label for="categorie"></label> <input class="text w3lpass" type="hidden" name="categorie" id="categorie"  value="<?php echo $compte['categorie']; ?>" >
                 
                 
                  <div class="row">
                    <div class="col-sm-12">
                      <input type="submit" value="Modifier">
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <?php
             }
            ?> 
            


            </div>
          </div>

        </div>
    </div>

<style type="text/css">
body{
    margin-top:20px;
    text-align: left;
}
.main-body {
    padding: 15px;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}


.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}

</style>
          
<section class="is-hero-bar">
  
  <li><div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script></li>
  
</section>

</body>
</html>