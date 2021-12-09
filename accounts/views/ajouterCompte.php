<?php
    include_once '../Model/Compte.php';
    include_once '../Controller/CompteC.php';
    
    $error = "";
    $hash="";
    $pass="";
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
			!empty($_POST['nom']) &&
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
            $compteC->ajoutercompte($compte);
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
   
  </head>

  <body id="reportsPage">
    <div class="" id="home">
      <nav class="navbar navbar-expand-xl">
        <div class="container h-100">
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
            <ul class="navbar-nav mx-auto h-100">
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
        <div class="row tm-content-row">
          <div class="tm-block-col tm-col-avatar">
            <div class="tm-bg-primary-dark tm-block tm-block-avatar">
              <h2 class="tm-block-title">Change Avatar</h2>
              <div class="tm-avatar-container">
                <img
                  src="img/avatar.png"
                  alt="Avatar"
                  class="tm-avatar img-fluid mb-4"
                />
                <a href="#" class="tm-avatar-delete-link">
                  <i class="far fa-trash-alt tm-product-delete-icon"></i>
                </a>
              </div>
              <button class="btn btn-primary btn-block text-uppercase">
                Upload New Photo
              </button>
            </div>
          </div>
          <div class="tm-block-col tm-col-account-settings">
            <div class="tm-bg-primary-dark tm-block tm-block-settings">
              <h2 class="tm-block-title">Create Account</h2>

              <script  src="../js/controle.js"></script>
              <form name="form" action="" method="POST" class="tm-signup-form row"  onsubmit="return verif()">
              
                <div class="form-group col-lg-6">
                  <label for="nom">Nom</label>
                  <input
                  type="text" name="nom" id="nom" maxlength="20"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="prenom">Prenom</label>
                  <input
                  type="text" name="prenom" id="prenom" maxlength="20"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="password">Password</label>
                  <input
                  type="password" name="password" id="password"
               
                    class="form-control validate"
                  />
                </div>
                  <div class="form-group col-lg-6">
                  <label for="mail">Mail</label>
                  <input
                  type="email" name="mail" id="mail"  
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="telephone">Telephone</label>
                  <input
                  type="text" name="telephone" id="telephone" maxlength="20"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                <label for="categorie">Categorie</label>              
                <select class="custom-select" name="categorie" id="categorie">
                <option>Choisir une categorie</option>
                  <option value="1">1-Responsable des comptes</option>
                  <option value="2">2-Responsable stock</option>
                  <option value="3">3-Responsable forum</option>
                  <option value="4">4-Responsable commandes</option>
                  <option value="5">5-Directeur de forum</option>
                  <option value="6">6-Responsable reclamations</option>
                  <option value="7">7-Client</option>
                </select>
                </div>
                <div class="form-group col-lg-6">
        
            <label for="IDcompte"></label>
            <input
            type="hidden" name="IDcompte" id="IDcompte" maxlength="20"
              class="form-control validate" value="NULL"
            />
          </div>
          <div class="form-group col-lg-6">

                </div>
                <div class="form-group col-lg-6">
                  <label class="tm-hide-sm">&nbsp;</label>
                
                  <button
                    type="submit"
                    name="Submit"
                    class="btn btn-primary btn-block text-uppercase"
                   id='add'
                  >
                   Ajouter un compte
                  </button>
                  <button
                    type="reset"
                    name="reset"
                    class="btn btn-primary btn-block text-uppercase"
                  >
                    Annuler
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
     
    </div>

  </body>
</html>
