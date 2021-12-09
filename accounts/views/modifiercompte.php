<?php
    include_once '../Model/Compte.php';
    include_once '../Controller/CompteC.php';

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
            header('Location:afficherListeComptes.php');
        }
        else
            $error = "Missing information";
    }    
?>
<!DOCTYPE html>
<html lang="en">
  <head> 
    <meta charset="UTF-8" />	
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Accounts - Product Admin Template</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
   
    <link rel="stylesheet" href="../css/fontawesome.min.css" />

    <link rel="stylesheet" href="../css/bootstrap.min.css" />
 
    <link rel="stylesheet" href="../css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>

  <body id="reportsPage">
    <div class="" id="home">
      <nav class="navbar navbar-expand-xl">
        <div class="container h-30">
          <a class="navbar-brand" href="index.html">
            <h1 class="tm-site-title mb-0">Product Admin</h1>
          </a>
          <button
            class="navbar-toggler ml-auto mr-0"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <i class="fas fa-bars tm-nav-icon"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto h-30">
              <li class="nav-item">
                <a class="nav-link" href="index.html">
                  <i class="fas fa-tachometer-alt"></i> Dashboard
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="far fa-file-alt"></i>
                  <span> Reports <i class="fas fa-angle-down"></i> </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Daily Report</a>
                  <a class="dropdown-item" href="#">Weekly Report</a>
                  <a class="dropdown-item" href="#">Yearly Report</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="products.html">
                  <i class="fas fa-shopping-cart"></i> Products
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" href="accounts.html">
                  <i class="far fa-user"></i> Accounts
                </a>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fas fa-cog"></i>
                  <span> Settings <i class="fas fa-angle-down"></i> </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Billing</a>
                  <a class="dropdown-item" href="#">Customize</a>
                </div>
              </li>
            </ul>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link d-block" href="login.html">
                  Admin, <b>Logout</b>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
        <!-- row -->
        <div class="container tm-mt-big tm-mb-big">
      
      <div class="row">
        <div class="col-xl-9 col-lg-3 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
          <center class="tm-block-title d-inline-block"> Modifier le profile </center>
        
                 <div id="error">
            <?php echo $error; ?>
        </div>

            <div id="error">
            <?php echo $error; ?>
        </div>
        <div class="row tm-edit-product-row">
		<?php
			if (isset($_POST['IDcompte'])){
				$compte = $compteC->recuperercompte($_POST['IDcompte']);
				
		?>
              
              <form action="" method="POST" class="tm-signup-form row">
              <div class="row" >
                <div class="form-group mb-3 col-xs-12 col-lg-6 col-sm-6">
            

                
                  <label for="nom">Nom:</label>
                  <input
                  type="text" name="nom" id="nom" value="<?php echo $compte['nom']; ?>" maxlength="20"
                    class="form-control validate"
                  />
                 </div>

                 <div class="form-group mb-3 col-xs-12 col-lg-6 col-sm-6">
            
                  <label for="prenom">prenom</label>
                  <input
                  type="text" name="prenom" id="prenom" value="<?php echo $compte['prenom']; ?>" maxlength="20"
                    class="form-control validate"
                  />
                  </div>
              </div>

              <div class="row" >
                <div class="form-group mb-3 col-xs-12 col-lg-6 col-sm-6">
            
                  <label for="password">Password</label>
                  <input
                  type="text" name="password" id="password" value="<?php echo $compte['password']; ?>"
                    class="form-control validate"
                  />
                  </div>

                 
                 <div class="form-group mb-3 col-xs-12 col-lg-6 col-sm-6">
            
                  <label for="telephone">telephone</label>
                  <input
                  type="text" name="telephone" id="telephone" value="<?php echo $compte['telephone']; ?>" maxlength="20"
                    class="form-control validate"
                  />
                  </div>
               </div>
               
            
               <div class="row" >
                <div class="form-group mb-3 col-xs-12 col-lg-6 col-sm-6">
                
                  <label for="mail">mail</label>
                  <input
                  type="text" name="mail" value="<?php echo $compte['mail']; ?>" id="mail"
                    class="form-control validate"
                  />
                  </div>
                  <div class="form-group mb-3 col-xs-12 col-lg-6 col-sm-6">
                
                  <label for="categorie">Categorie:</label>
                  <select class="custom-select" name="categorie" id="categorie">
                <option><?php echo $compte['categorie']; ?></option>
                  <option value="1">1-Responsable des comptes</option>
                  <option value="2">2-Responsable stock</option>
                  <option value="3">3-Responsable forum</option>
                  <option value="4">4-Responsable commandes</option>
                  <option value="5">-5Directeur de forum</option>
                  <option value="6">6-Responsable reclamations</option>
                  <option value="7">7-Client</option>
                </select>

      
                  </div>
                  </div>
                  
                  <label for="IDcompte"> </label>
                  <input
                  type="hidden" name="IDcompte" id="IDcompte" value="<?php echo $compte['IDcompte']; ?>" maxlength="20"
                    class="form-control validate"
                  />
                  </div>  
                  <div class="form-group mb-3">
                  <label class="tm-hide-sm">&nbsp;</label>
                  <input type="submit" value="Modifier"  class="btn btn-primary btn-block text-uppercase" > 
                  </div>
                  <div class="form-group mb-3">
                <!-- <a href="supprimercompte.php?IDcompte=<?php echo $compte['IDcompte']; ?>" class="tm-product-delete-link">
                      Delete your profile  <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a> -->

                    <!--  <button   class="btn btn-primary btn-block text-uppercase"  onclick="window.open('supprimercompte.php?IDcompte=<?php echo $compte['categorie']; ?>','_self')"
                  >
                  Delete your profile 
                   </button> -->
                                       
                 <button   class="btn btn-primary btn-block text-uppercase"  onclick="window.open('afficherListeComptes.php','_self')"
                  >
                   Retour à la liste des comptes
                   </button>
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
      
    </div>

  </body>
</html>