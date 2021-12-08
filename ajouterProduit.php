<?php
    include_once '../Model/Produit.php';
    include_once '../Controller/ProduitC.php';
    
    $error = "";

    // create 
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
            !empty($_POST["images"]) && 
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
            $produitC->ajouterproduit($produit);
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
      <div class="container mt-5">
        <div class="row tm-content-row">
          
        </div>
        <!-- row -->
        
          <div class="tm-block-col tm-col-account-settings">
            <div class="tm-bg-primary-dark tm-block tm-block-settings">
              <h2 class="tm-block-title">ADD Product</h2>
              
             <script src="../js/all-numbers.js"></script>
              <form  action="" method="POST" class="tm-signup-form row" name="form" onsubmit="return allnumeric(document.form.prix)" >
              
                <div class="form-group col-lg-6">
                  <label for="nom">Nom</label>
                  <input
                  type="text" name="nom" id="nom" maxlength="20"
                    class="form-control validate"
                  />
                </div>

                <div class="form-group col-lg-6">
                  <label for="images">Select Images </label>
                  <input
                  type="file" name="images" id="images" maxlength="20"
                    class="form-control validate"
                  />
                 
                </div>
              
               

                

                <div class="form-group col-lg-6">
                  <label for="prix">Prix</label>
                  <input
                  type="text" name="prix" id="prix" maxlength="20"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="quantite">Quantite</label>
                  <input
                  type="text" name="quantite" id="quantite"
               
                    class="form-control validate"
                  />
                </div>

                <div class="form-group col-lg-6">
                  <label for="descriptions">Descriptions</label>
                  <input
                  type="text" name="descriptions" id="descriptions"
                    class="form-control validate"
                  />
                </div>
                
                
                <div class="form-group col-lg-6">
                  <label for="mail">category :

                  </label>
                  
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
                
                <div class="form-group col-lg-6">
        
            <label for="id_produit"></label>
            <input
            type="hidden" name="id_produit" id="id_produit" maxlength="20"
              class="form-control validate" value="NULL"
            />
          </div>
                <div class="form-group col-lg-6">
                  <label class="tm-hide-sm">&nbsp;</label>
                
                  <button
                    type="submit"
                    name="Submit"
                    class="btn btn-primary btn-block text-uppercase"
                   id='add'
                  >
                    ADD 
                  </button>
                  <button
                    type="reset"
                    name="reset"
                    class="btn btn-primary btn-block text-uppercase"
                  >
                    Cancel
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
