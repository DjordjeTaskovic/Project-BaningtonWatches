<html >
    <?php
    session_start();
      include "config/connection.php";
      include "modeli/fungcije.php";
      
    @include('page_parts/head.php');
    ?>
<body>

<header class="header_area fixed">
<div class="main_menu">
<?php
    @include('page_parts/nav.php');
    ?>
</div>
</header>


<section class="blog-banner-area" id="category">
<div class="container h-100">
<div class="blog-banner">
<div class="text-center">
<h1>Shopping Cart</h1>
<nav aria-label="breadcrumb" class="banner-breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
</ol>
</nav>
</div>
</div>
</div>
</section>

<section class="cart_area">
<div class="container">
<div class="cart_inner">
<div class="table-responsive">
<table class="table">
        <thead>
        <tr>
        <th scope="col"><h5>ID</h5></th>
           <th scope="col" class="text-center"><h5>Product</h5></th>
                <th scope="col"class="text-center"><h5>Category</h5></th>
               <th scope="col"><h5>Price</h5></th>
              <th scope="col"><h5>Quantity</h5></th>
             <th scope="col"><h5>Total</h5></th>
        </tr>
        </thead>
  <tbody id="cart_ispis">
   <!-- cart_ispis -->
  
    
  </tbody>
</table>
<div id="shoping-checkout " class="container">
<div class="row">
  <div class="col-12 bottom_button d-flex">
    <button type="button" class="button btn-delete">Remove</button>
    
  </div>
  <div class="col-12">
    <div class="checkout_btn_inner d-flex align-items-center justify-content-center">
      <a class="button button-hero" href="products.php">Continue Shopping</a>
    
      <a class="button button-hero" href="#" id="make_order">Make an order</a>
    </div>
    <div id="order_poruka"></div>
  </div>
</div>

</div>
</div>
</div>
</div>
</section>

<?php 
@include('page_parts/footer.php');
if(isset($_SESSION['korisnik'])):

  $korisnik = $_SESSION['korisnik'];
  $IDkorisnik = $korisnik->id_korisnik;
 // var_dump("ID");
 // var_dump($IDkorisnik);
 ?>
<p id="proslediID"><?=$IDkorisnik?></p>
 <?php
 endif;
 ?>
</body>
</html>