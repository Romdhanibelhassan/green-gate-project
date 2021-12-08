<?php
    include_once '../Model/Category.php';
    include_once '../Controller/CategoryC.php';
    
    $error = "";

    // create 
    $category = null;

    // create an instance of the controller
    $categoryC = new CategoryC();
    if (
      isset($_POST["id_category"]) &&
        isset($_POST["types"]) 
	
    ) {
        if (
          !empty($_POST["id_category"]) && 
            !empty($_POST["types"])  
			
        ) {
            $category = new Category(
              $_POST['id_category'],
                $_POST['types']
			
              
            );
            $categoryC->ajoutercategory($category);
            header('Location:afficherListeCategory.php');
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
      <div class="container mt-5">
        <div class="row tm-content-row">
          <div class="col-12 tm-block-col">
            
          </div>
        </div>
        <!-- row -->
        <div class="row tm-content-row">
          <div class="tm-block-col tm-col-avatar">
            
            </div>
          </div>
          <div class="tm-block-col tm-col-account-settings">
            <div class="tm-bg-primary-dark tm-block tm-block-settings">
              <h2 class="tm-block-title">ADD Category</h2>

              
              <form name="form" action="" method="POST" class="tm-signup-form row" >
              
                <div class="form-group col-lg-6">
                  <label for="types">Types</label>
                  <input
                  type="text" name="types" id="nom" maxlength="20"
                    class="form-control validate"
                  />
                </div>
               
                
                
                
                
                
                <div class="form-group col-lg-6">
        
            <label for="id_category"></label>
            <input
            type="hidden" name="id_category" id="id_category" maxlength="20"
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
                  <a href="afficherListeCategory.php" class="btn btn-primary btn-block text-uppercase" > Cancel </a>
                  
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
     
    </div>

  </body>
</html>
