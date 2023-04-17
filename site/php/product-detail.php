<?php

require 'database.php';

$sql = "SELECT * FROM productinfo";

$result = mysqli_query($conn, $sql);

$productinfo = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>Product Details</title>
</head>

<body>

    <body>
        <!--Begin Header-->
        <header>
            <div class="header-top">

            </div>
            <div class="header-bottom">

                <div class="container">
                    <div class="navbar">
                        <nav>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Nieuw</a></li>
                                <li><a href="#">Desktops</a></li>
                                <li><a href="#">Gaming Pc's</a></li>
                                <li><a href="#">Laptops</a></li>
                            </ul>
                        </nav>
                        <img src="menu.png" class="menu-icon">
</div>
</div>
                   
        </header>
        <!--Einde header-->
        <!--Begin Gegevens Main-->
        
        
            <h1><?php echo $productinfo['productnaam'];?></h1>

        <h3>Specificaties</h3>

<table>
<?php foreach ($productinfo as $product): ?>
    <tr>
            <th>Product Code</th>
            <div class="product-data-spacing">

            </div>
            <td><?php echo $product['productcode']; ?></td>
    </tr>
    <tr>
    <th>Merk</th>
    <div class="product-data-spacing">

            </div>
            <td><?php echo $product['merk']; ?></td>
    </tr>
    <tr>
    <th>Ram Geheugen</th>
            <td><?php echo $product['ramgeheugen']; ?></td>
    </tr>
    <tr>
    <th>Soort Geheugen</th>
            <td><?php echo $product['soortgeheugen']; ?></td> 
    </tr>
    <tr>
            <th>Opslag capaciteit</th> 
            <td><?php echo $product['opslagcapaciteit']; ?></td>
    </tr>
    <tr>
    <th>CPU</th>
            <td><?php echo $product['cpu']; ?></td>
    </tr>
    <tr>
    <th>GPU</th>        
    <td><?php echo $product['gpu']; ?></td>
    </tr>
    <tr>
    <th>Ventilator</th>
            <td><?php echo $product['ventilator']; ?></td>
    </tr>
    <tr>
    <th>Bluetooth</th>
            <td><?php echo $product['bluetooth']; ?></td> 
    </tr>
    <tr>
    <th>Kloksnelheid</th>
    <td><?php echo $product['kloksnelheid']; ?></td>
    </tr>   
    <tr>
    <th>Beschrijving</th>
    <td><?php echo $product['beschrijving']; ?></td>
    </tr>      
            <?php endforeach ?>
    </table>
   
        <!--Einde Catalog Main-->
        <!--Begin Footer-->
        <footer class="footer">
            <div class="container-footer">
                <div class="rij">
                    <div class="footer-col">
                        <h4>Bedrijf</h4>
                        <ul>
                            <li><a href="#">Over ons</a></li>
                            <li><a href="#">Onze services</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Hulp Nodig?</h4>
                        <ul>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Leveren over zee</a></li>
                            <li><a href="#">Refunds</a></li>
                            <li><a href="#">Status Bestelling</a></li>
                            <li><a href="#">Betaal opties</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Online Shop</h4>
                        <ul>
                            <li><a href="#">Desktop's</a></li>
                            <li><a href="#">Laptops</a></li>
                            <li><a href="#">Gaming Desktop's</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Volg ons!</h4>
                        <div class="social-links">
                            <a href="#"> <i class="fab fa-facebook-f"></i></a>
                            <a href="#"> <i class="fab fa-twitter"></i></a>
                            <a href="#"> <i class="fab fa-instagram"></i></i></a>
                            <a href="#"> <i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
        </footer>
        </div>
        <!--Einde Footer-->
    </body>

</html>


</body>