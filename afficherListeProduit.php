<?php
	include '../Controller/ProduitC.php';
 

	$produitC=new ProduitC();
	$listeProduit=$produitC->afficherproduit(); 

  

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Product Page - Admin HTML Template</title>
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
                <i class="fas fa-shopping-cart"></i> Products
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
    <div class="container mt-5">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">id_produit</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Images</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Quantite</th>
                    <th scope="col">Description</th>
                    <th scope="col">category</th>
                    
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <?php
				foreach($listeProduit as $produit){
			?>
                <tbody>
                  <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name"><?php echo $produit['id_produit']; ?></td>
                    <td class="tm-product-name"><?php echo $produit['nom']; ?></td>
                    <td class="tm-product-name"><?php echo $produit['images']; ?></td>
                    <td class="tm-product-name"><?php echo $produit['prix']; ?></td>
                    <td class="tm-product-name"><?php echo $produit['quantite']; ?></td>
                    <td class="tm-product-name"><?php echo $produit['descriptions']; ?></td>
                    <td class="tm-product-name"><?php echo $produit['category']; ?></td>
                    
                    <td>
                      <form method="POST" action="modifierproduit.php">
                        <input type="submit" name="Modifier" value="Modifier"  class="btn btn-primary btn-block text-uppercase">
                        <input type="hidden" value=<?PHP echo $produit['id_produit']; ?> name="id_produit">
                      </form>
                    </td>
                    <td>
                      <a href="supprimerproduit.php?id_produit=<?php echo $produit['id_produit']; ?>" class="tm-product-delete-link">
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
            <a href="ajouterProduit.php" class="btn btn-primary btn-block text-uppercase" > ADD New Product  </a>
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
