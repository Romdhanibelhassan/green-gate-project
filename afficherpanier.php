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
		isset($_POST["ratings"]) && 
        isset($_POST["category"]) 
    ) {
        if (
          !empty($_POST["id_produit"]) && 
            !empty($_POST["nom"]) && 
            !empty($_POST["images"]) && 
			!empty($_POST['prix']) &&
            !empty($_POST["quantite"]) && 
			!empty($_POST["ratings"]) && 
            !empty($_POST["category"]) 
        ) {
            $produit = new Produit(
              $_POST['id_produit'],
                $_POST['nom'],
                $_POST['images'],
				$_POST['prix'],
                $_POST['quantite'], 
				$_POST['ratings'],
                $_POST['category']
              
            );
        }
        else
            $error = "Missing information";
    }    
?>
 <?php
				     foreach($listeProduit as $produit){
			        ?> 
                    <div class="container py-3">
<div class="row">
            <div class="col-lg-3">
                  <div class="card mb-4 product-wap rounded-5">
                            <div class="card rounded-5">
                                <img class="card-img rounded-5 img-fluid" width="200" height="300" src="../imgs/<?php echo $produit['images']; ?>">
                                
                            </div>
                            <div class="card-body">
                              <form method="POST" action="afficherProduit.php" >
                        
                             <input  type="submit" id="nom" name="nom" value="<?php echo $produit['nom']; ?>" >
                               </form>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    
                                   
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                   
                                </ul>
                                <p class="text-center mb-0"> PRICE: <?php echo $produit['prix']; ?> $</p>
                            </div>
                        </div>
                     </div>
                    
                       

                     </div>       
         </div> 

                     
                     <?php
				} 
			    ?> 