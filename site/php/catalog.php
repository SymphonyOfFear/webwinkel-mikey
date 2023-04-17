<?php

require 'database.php';

$sql = "SELECT * FROM productinfo";

$result = mysqli_query($conn, $sql);

$productDetails = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT * FROM productinfo";

$result = mysqli_query($conn, $sql);

$merken = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT * FROM productinfo";

$result = mysqli_query($conn, $sql);

$merken = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Product Categorie</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
  </head>
  <body>
      <!---Navbar-->
      <header class="main-menu menu">
          <div class="container-fluid">
              <div class="row align-items-center justify-content-center">
                  <div class="col-lg-11">
                      <nav class="navbar navbar-expand-lg navbar-light">
                          <a class="navbar-brand" href="index.html">
                              <img src="Images/logo.png"alt="logo">
                          </a>
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNav"aria-control="myNav" aria-expanded="false" aria-label="toggle navigation">
                              <span class="nav-icon">
                                  <i class="fas fa-bars"></i>
                              </span>
                          </button>
                          <div class="collapse navbar-collapse main-menu-item"id="myNav">
                              <ul class="navbar-nav">
                                  <li class="nav-item">
                                      <a class="nav-link" href="">Home</a>
                                  </li>
                                  <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="navbarDropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
                                    <div class="dropdown-menu"aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="">Shop Categorie</a>
                                        <a class="dropdown-item" href="">Product Details</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"href="">Contact</a>
                                </li>
                              </ul>

                          </div>
                          <div class="d-flex">
                              <div class="cart">
                                  <i class="fas fa-shopping-cart"></i>
                              </div>
                          </div>
                      </nav>
                  </div>
              </div>
          </div>
      </header>
      <!--Breadcrumbs-->
      <section class="breadcrumb breadcrumb-bg">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-12">
                      <div class="crumb-inner">
                          <div class="crumb-text">
                              <p>Home /  Categorie</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!---Einde Navbar-->
      <!---Side bar-->
      <section class="category">
          <div class="container">
              <div class="row">
                  <div class="col-lg-3">
                      <div>
                          <aside class="side-area product-side side-shadow mt-5">
                              <div class="side-title">
                                  <h3>Product-titel</h3>

                              </div>
                              <div class="side-content">
                                  <ul class="list">
                                      <p>Brands</p>
                    <li>
                      <?php foreach():?>
          <input type="radio"aria-label="radio button">
             <a href=""></a></li>
             <li>
                <input type="radio"aria-label="radio button">
                   <a href="">Rolex</a></li>
                   <li>
                    <input type="radio"aria-label="radio button">
                       <a href="">Rado</a></li>
                       <li>
                        <input type="radio"aria-label="radio button">
                           <a href="">Seiko</a></li>
                           <li>
                            <input type="radio"aria-label="radio button">
                               <a href="">Samsung</a></li>
                                      
                                  </ul>
                                  <ul class="list">
                                      <p>Color</p>
                           <li>
                       <input type="radio"aria-label="radio button">
                         <a href="">Black</a></li>
                         <li>
                         <input type="radio"aria-label="radio button">
                         <a href="">Black Leather</a></li>
                         <li>
                         <input type="radio"aria-label="radio button">
                         <a href="">Black with Red</a></li>
                         <li>
                         <input type="radio"aria-label="radio button">
                         <a href="">Gold</a></li>
                         <li>
                         <input type="radio"aria-label="radio button">
                         <a href="">Space grey</a></li>
                                      
                        </ul>
                              </div>
                          </aside>
                      </div>
                  </div>
                  <div class="col-lg-9">
                      <div class="row">
                          <div class="col-lg-12">
                              <div class="product-top d-flex justify-content-between align-items-center">
                                  <div class="product-sec product-item">
                                      <h2 class="my-5">Computers</h2>
                                  </div>
                              </div>
                          </div>
             <div class="col-lg-4 col-sm-6">
                    <div class="product-cate">
                      <div>
                   <img src="Images/image1.jpg"alt="">
                   <div class="product-icon">
                      <ul>
                    <li><a href=""><i class="fas fa-heart"></i></a> </li>
                    <li><a href=""><i class="fas fa-shopping-cart"></i></a> </li>
                    
                      </ul>
                      </div>
                      <!------>
                      <div class="product-des">
                          <h5> Watch Brand</h5>
                          <p>$1500.00</p>
                      </div>
                      </div>
                              </div>
                          </div>
                          <!----->
                          <div class="col-lg-4 col-sm-6">
                            <div class="product-cate">
                              <div>
                           <img src="Images/image2.jpg"alt="">
                           <div class="product-icon">
                              <ul>
                            <li><a href=""><i class="fas fa-heart"></i></a> </li>
                            <li><a href=""><i class="fas fa-shopping-cart"></i></a> </li>
                            
                              </ul>
                              </div>
                              <!------>
                              <div class="product-des">
                                  <h5> Watch Brand</h5>
                                  <p>$1500.00</p>
                              </div>
                              </div>
                                      </div>
                                  </div>
                                  <!----->
                                  <div class="col-lg-4 col-sm-6">
                                    <div class="product-cate">
                                      <div>
                                   <img src="Images/image3.jpg"alt="">
                                   <div class="product-icon">
                                      <ul>
                                    <li><a href=""><i class="fas fa-heart"></i></a> </li>
                                    <li><a href=""><i class="fas fa-shopping-cart"></i></a> </li>
                                    
                                      </ul>
                                      </div>
                                      <!------>
                                      <div class="product-des">
                                          <h5> Watch Brand</h5>
                                          <p>$1500.00</p>
                                      </div>
                                      </div>
                                              </div>
                                          </div>
                                          <!----->
               <div class="col-lg-4 col-sm-6">
                <div class="product-cate">
                  <div>
               <img src="Images/image4.jpg"alt="">
                   <div class="product-icon">
                      <ul>
                        <li><a href=""><i class="fas fa-heart"></i></a> </li>
                   <li><a href=""><i class="fas fa-shopping-cart"></i></a> </li>
                                            
                </ul>
                    </div>
                      <!------>
                          <div class="product-des">
                          <h5> Watch Brand</h5>
                            <p>$1500.00</p>
                          </div>
                         </div>
                           </div>
                            </div>
                             <!----->
                         <div class="col-lg-4 col-sm-6">
                             <div class="product-cate">
                              <div>
                             <img src="Images/image5.jpg"alt="">
                            <div class="product-icon">
                               <ul>
                               <li><a href=""><i class="fas fa-heart"></i></a> </li>
                                 <li><a href=""><i class="fas fa-shopping-cart"></i></a> </li>
                                 </ul>
                                    </div>
                            <!------>
                           <div class="product-des">
                                  <h5> Watch Brand</h5>
                                    <p>$1500.00</p>
                                   </div>
                                 </div>
                                     </div>
                                       </div>
                               <!----->
                               <div class="col-lg-4 col-sm-6">
                                <div class="product-cate">
                                 <div>
                                <img src="Images/image6.jpg"alt="">
                               <div class="product-icon">
                                  <ul>
                                  <li><a href=""><i class="fas fa-heart"></i></a> </li>
                                    <li><a href=""><i class="fas fa-shopping-cart"></i></a> </li>
                                    </ul>
                                       </div>
                               <!------>
                              <div class="product-des">
                                     <h5> Watch Brand</h5>
                                       <p>$1500.00</p>
                                      </div>
                                    </div>
                                        </div>
                                          </div>
                                  <!----->
                                  <div class="col-lg-4 col-sm-6">
                                    <div class="product-cate">
                                     <div>
                                    <img src="Images/image7.jpg"alt="">
                                   <div class="product-icon">
                                      <ul>
                                      <li><a href=""><i class="fas fa-heart"></i></a> </li>
                                        <li><a href=""><i class="fas fa-shopping-cart"></i></a> </li>
                                        </ul>
                                           </div>
                                   <!------>
                                  <div class="product-des">
                                         <h5> Watch Brand</h5>
                                           <p>$1500.00</p>
                                          </div>
                                        </div>
                                            </div>
                                              </div>
                                      <!----->
                                      <div class="col-lg-4 col-sm-6">
                                        <div class="product-cate">
                                         <div>
                                        <img src="Images/image8.jpg"alt="">
                                       <div class="product-icon">
                                          <ul>
                                          <li><a href=""><i class="fas fa-heart"></i></a> </li>
                                            <li><a href=""><i class="fas fa-shopping-cart"></i></a> </li>
                                            </ul>
                                               </div>
                                       <!------>
                                      <div class="product-des">
                                             <h5> Watch Brand</h5>
                                               <p>$1500.00</p>
                                              </div>
                                            </div>
                                                </div>
                                                  </div>
                                          <!----->
                                          <div class="col-lg-4 col-sm-6">
                                            <div class="product-cate">
                                             <div>
                                            <img src="Images/image9.jpg"alt="">
                                           <div class="product-icon">
                                              <ul>
                                              <li><a href=""><i class="fas fa-heart"></i></a> </li>
                                                <li><a href=""><i class="fas fa-shopping-cart"></i></a> </li>
                                                </ul>
                                                   </div>
                                           <!------>
                                          <div class="product-des">
                                                 <h5> Watch Brand</h5>
                                                   <p>$1500.00</p>
                                                  </div>
                                                </div>
                                                    </div>
                                                      </div>
                                              <!----->
                          <div class="col-lg-12 text-center">
                              <a href=""class="product-btn">More Items</a>
                          </div> 
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!--Einde Sidebar-->     
    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>