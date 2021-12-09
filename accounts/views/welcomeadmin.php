<?php
// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['e']))
{
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: adminlogin.php');
   }
   echo 'Bienvenue Utilisateur ', $_SESSION['e'];
?>
<?php
	include '../Controller/CompteC.php';
	$compteC=new CompteC();
	$listeComptes=$compteC->affichercomptes(); 
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Back end</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="../css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="../css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>

  <body id="reportsPage">
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
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Daily Report</a>
                <a class="dropdown-item" href="#">Weekly Report</a>
                <a class="dropdown-item" href="#">Yearly Report</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="products.html">
                <i class="fas fa-shopping-cart"></i> products
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
                <span>settings<i class="fas fa-angle-down"></i> </span>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Profile</a>
                <a class="dropdown-item" href="#">Billing</a>
                <a class="dropdown-item" href="#">Customize</a>
                <button><a href="deconnexion.php">Déconnecter</a></button>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
           
              <a class="nav-link d-block" href="deconnexion.php">
                <?php echo $_SESSION['e']?>  <b>,Logout</b>
              </a>
             
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container mt-5">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">IDcompte</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Categorie</th>
                    <th scope="col">Password</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <?php
			    	foreach($listeComptes as $compte){
		       	?>
                <tbody>
                  <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name"><?php echo $compte['IDcompte']; ?></td>
                    <td class="tm-product-name"><?php echo $compte['telephone']; ?></td>
                    <td class="tm-product-name"><?php echo $compte['nom']; ?></td>
                    <td class="tm-product-name"><?php echo $compte['prenom']; ?></td>
                    <td class="tm-product-name"><?php echo $compte['mail']; ?></td>
                    <td class="tm-product-name"><?php echo $compte['categorie']; ?></td>
                    <td class="tm-product-name"> <?php echo $compte['password']; ?></td>
                  
                    <td>
                      <form method="POST" action="modifiercompte.php">
                        <input type="submit" name="Modifier" value="Modifier"  class="btn btn-primary btn-block text-uppercase">
                        <input type="hidden" value=<?PHP echo $compte['IDcompte']; ?> name="IDcompte">
                      </form>
                    </td>
                    <td>
                      <a href="supprimercompte.php?IDcompte=<?php echo $compte['IDcompte']; ?>" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                </tbody>
				<?php
				}
		  	?>
              </table>
            </div>
            <!-- table container -->
            <button class="btn btn-primary btn-block text-uppercase" onclick="window.open('ajouterCompte.php','_self')" >Ajouter un compte  </button>
          </div>
        </div>
        
          </div>
        </div>
      </div>
    </div>
    <footer class="tm-footer row tm-mt-small">
      <div class="col-12 font-weight-light">
        <p class="text-center text-white mb-0 px-4 small">
          Copyright &copy; <b>2021</b> All rights reserved. 
          
        </p>
      </div>
    </footer>

 
  
  </body>
</html>
