<?php 
//require_once 'register/controllers/authController.php'; 
session_start();
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    verifyUser($token);
}

if (!isset($_SESSION['id'])) {
    header('location: register/signup.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-shop</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link   -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
<!-- header section starts  -->

<header class="header">

   
    <nav class="navbar" style="margin: auto;">
        <a href="#home">Domů</a>
        <a href="#about">O nás</a>
        <a href="#products">Produkty</a>
        
    </nav>

    <div class="icons">
        <div class="fas fa-search" id="search-btn"></div>
        <div class="fas fa-shopping-cart" id="cart-btn"></div>
        <div class="fas fa-bars" id="menu-btn"></div>
       <a href="register/login.php"> <div class="fas fa-user" id="login-btn"></div>
</a>
</div> 
    <div class="search-form">
        <input type="search" id="search-box" placeholder="Hledat">
        <label for="search-box" class="fas fa-search"></label>
    </div>

    <div class="cart-items-container">
        <div class="cart-item">
            <span class="fas fa-times"></span>
            <img src="images/cart-item-1.png" alt="">
            <div class="content">
                <h3>cart item 01</h3>
                <div class="price">$15.99/-</div>
            </div>
        </div>
        <div class="cart-item">
            <span class="fas fa-times"></span>
            <img src="images/cart-item-2.png" alt="">
            <div class="content">
                <h3>cart item 02</h3>
                <div class="price">$15.99/-</div>
            </div>
        </div>
        <div class="cart-item">
            <span class="fas fa-times"></span>
            <img src="images/cart-item-3.png" alt="">
            <div class="content">
                <h3>cart item 03</h3>
                <div class="price">$15.99/-</div>
            </div>
        </div>
        <div class="cart-item">
            <span class="fas fa-times"></span>
            <img src="images/cart-item-4.png" alt="">
            <div class="content">
                <h3>cart item 04</h3>
                <div class="price">$15.99/-</div>
            </div>
        </div>
        <a href="#" class="btn">checkout now</a>
    </div>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>Vítejte na Coffe Shop</h3>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat labore, sint cupiditate distinctio tempora reiciendis.</p>
        <a href="produkty/produkty.html" class="btn">koupit zde</a>
    </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <h1 class="heading"> <span>O</span> Nás </h1>

    <div class="row">

        <div class="image">
            <img src="images/about-img.jpeg" alt="">
        </div>

        <div class="content">
            <h3>Lorem, ipsum dolor sit amet consectetur adipisicing elit</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit amet enim quod veritatis</p>
        </div>

    </div>

</section>

<!-- about section ends -->
<section class="products" id="products">
 <h1 class="heading"> Naše <span>Produkty</span> </h1>
 <div class="prd-btn" ><a href="produkty/produkty.html" class="prd-bn">Zobrazit všechny produkty</a></div>
    <div id="productsBox" class="box-container">

        
    </div>

</section>


<!-- contact section starts  -->

<section class="contact" id="contact">

    <h1 class="heading"> <span>Kontaktujte</span> nás </h1>

    <div class="row">

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2528.5555909878663!2d14.04751929283503!3d50.67251136435002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47099b571c3c8257%3A0x42f4d39d53df4444!2zU3TFmWVkbsOtIHByxa9teXNsb3bDoSDFoWtvbGEsIMOac3TDrSBuYWQgTGFiZW0sIFJlc3Nsb3ZhIDUsIHDFmcOtc3DEm3Zrb3bDoSBvcmdhbml6YWNlIC0gU3TFmWVkaXNrbyBTdMWZw61icm7DrWt5!5e0!3m2!1sen!2scz!4v1641754649211!5m2!1sen!2scz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

        <form action="">
            <h3></h3>
            <div class="inputBox">
                <span class="fas fa-user"></span>
                <input type="text" placeholder="Jméno">
            </div>
            <div class="inputBox">
                <span class="fas fa-envelope"></span>
                <input type="email" placeholder="email">
            </div>
            <div class="inputBox">
                <span class="fas fa-phone"></span>
                <input type="text" placeholder="Telefonní číslo">
            </div>
            <div>
                <span class="fas fa-"></span>
            </div>
            <input type="submit" value="contact now" class="btn">
        </form>

    </div>

</section>

<!-- contact section ends -->


<!-- footer section starts  -->

<section class="footer">

    <div class="share">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
        <a href="#" class="fab fa-pinterest"></a>
    </div>

    <div class="links">
        <a href="#home">domů</a>
        <a href="#about">o nás</a>
        <a href="#products">produkty</a>
        <a href="#contact">Kontakt</a>
    </div>

    
</section>

<!-- footer section ends -->
<!-- custom js file link  -->
<script src="js/products.js"></script>
<script src="js/Components/listProduct.js"></script>
<script src="js/Components/product.js"></script>
</body>
</html>