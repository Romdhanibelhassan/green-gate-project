<?php
    include_once '../Model/Produit.php';
    include_once '../Controller/ProduitC.php';

    $error = "";

    // create adherent
    $produit = null;

    // create an instance of the controller
    $produitC = new ProduitC();
    if (
      isset($_POST["id_produit"]) &&
        isset($_POST["nom"]) &&
        isset($_POST["images"]) &&
		isset($_POST["prix"]) &&		
        isset($_POST["quantite"]) &&
		isset($_POST["descriptions"]) && 
        isset($_POST["category"]) 
    ) {
        if (
          !empty($_POST["id_produit"]) && 
            !empty($_POST["nom"]) && 
            !empty($_POST['images']) &&
			!empty($_POST['prix']) &&
            !empty($_POST["quantite"]) && 
			!empty($_POST["descriptions"]) && 
            !empty($_POST["category"]) 
        ) {
            $produit = new Produit(
              $_POST['id_produit'],
                $_POST['nom'],
                $_POST['images'],
				$_POST['prix'],
                $_POST['quantite'], 
				$_POST['descriptions'],
                $_POST['category']
              
            );
            $produitC->modifierProduit($produit, $_POST["id_produit"]);
            header('Location:afficherListeProduit.php');
        }
        else
            $error = "Missing information";
    }    
    $categoryC =new categoryC();
$categor = $categoryC->affichercategory();

$ProduitC =new produitC();
if (isset($_POST['category']) && isset ($_POST['search']))
{
    $list =$ProduitC->afficherproduits($_POST['category']);
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
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Modifey Product</h2>
              </div>
            </div>
            <div id="error">
            <?php echo $error; ?>
        </div>

            <div id="error">
            <?php echo $error; ?>
        </div>
        <div class="row tm-edit-product-row">
		<?php
			if (isset($_POST['id_produit'])){
				$produit = $produitC->recupererproduit($_POST['id_produit']);
				
		?>
              <script src="../js/all-numbers.js"></script>
              <form action="" method="POST" class="tm-signup-form row" name="form"  onsubmit="return allnumeric(document.form.prix)" >
              <div class="row" >
                <div class="form-group mb-3 col-xs-12 col-lg-6 col-sm-6">
            

                
                  <label for="nom">Nom:</label>
                  <input
                  type="text" name="nom" id="nom" value="<?php echo $produit['nom']; ?>" maxlength="20"
                    class="form-control validate"
                  />
                 </div>
                 <div class="form-group col-lg-6">
                  <label for="images">Select Images </label>
                  
                <input
                  type="file" name="images" id="images" value="<?php echo $produit['images']; ?>"  maxlength="20"
                  
                    class="form-control validate"
                />
                  
                </div>

                 <div class="form-group mb-3 col-xs-12 col-lg-6 col-sm-6">
            
                  <label for="prix">prix</label>
                  <input
                  type="text" name="prix" id="prix" value="<?php echo $produit['prix']; ?>" maxlength="20"
                    class="form-control validate"
                  />
                  </div>
              </div>

              <div class="row" >
                <div class="form-group mb-3 col-xs-12 col-lg-6 col-sm-6">
            
                  <label for="quantite">Quantite</label>
                  <input
                  type="text" name="quantite" id="quantite" value="<?php echo $produit['quantite']; ?>"
                    class="form-control validate"
                  />
                  </div>

                 
                 <div class="form-group mb-3 col-xs-12 col-lg-6 col-sm-6">
            
                  <label for="descriptions">Descriptions:</label>
                  <input
                  type="text" name="descriptions" id="descriptions" value="<?php echo $produit['descriptions']; ?>" maxlength="20"
                    class="form-control validate"
                  />
                  </div>
               </div>
               
            
               <div class="row" >
                <div class="form-group mb-3 col-xs-12 col-lg-6 col-sm-6">
                
                  <label for="category">category</label>
                  <select name="category" id="category">
        <?php foreach($categor as $category){
            ?>
        <option 
        value="<?= $category['id_category'] ?>"
<?php if(isset($_POST['category'])) if(isset($_POST['search']) && $category['id_category'] === $_POST['category']) 
?>
SELECTED
>
<?php echo $category['types']?>
</option>
<?php } ?>
</select>

                  
                  </div>

                  </div>
                  
                  <label for="id_produit"> </label>
                  <input
                  type="hidden" name="id_produit" id="id_produit" value="<?php echo $produit['id_produit']; ?>" maxlength="20"
                    class="form-control validate"
                  />
                  </div>  
                  <div class="form-group mb-3">
                  <label class="tm-hide-sm">&nbsp;</label>
                  <input type="submit" value="Modifier"  class="btn btn-primary btn-block text-uppercase" > 
                  </div>
                  <div class="form-group mb-3">
                <!-- <a href="supprimerProduit.php?id_produit=<?php echo $produit['id_produit']; ?>" class="tm-product-delete-link">
                      Delete your profile  <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a> -->

                      <button   class="btn btn-primary btn-block text-uppercase"  onclick="window.open('supprimerproduit.php?IDproduit=<?php echo $produit['id_produit']; ?>','_self')"
                  >
                  Delete Product 
                   </button>
                      <br>
                      
                 <button   class="btn btn-primary btn-block text-uppercase"  onclick="window.open('afficherListeProduit.php','_self')"
                  >
                   Return to product list
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