<html >
   
<?php
session_start();
include "config/connection.php";
include "modeli/fungcije.php";

 @include('page_parts/head.php');
 
    ?>
<body>

<header class="header_area">
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
<h1>Shop Products</h1>
</div>
</div>
</div>
</section>


<section class="section-margin--small mb-5">
<div class="container">
<div class="row">
<div class="col-xl-3 col-lg-4 col-md-5">
<div class="sidebar-categories">
<div class="head">Categories-Gender</div>
<ul id="main-categories">
             <?php
            $pol = vratiPol();
            foreach ($pol as $e){
                echo"<li class='filter-list'>
                <input class='pixel-radio' type='radio' id='".$e->nazivpola."'
                 name='brand'><label>".$e->nazivpola."</label></li>";
            }
            ?>
</ul>
</div>
<div class="sidebar-categories">
<div class="head">Categories-Tipe</div>
<ul id="main-categories">
            <?php
            $tip = vratiTipove();
            foreach ($tip as $e){
                echo"<li class='filter-list'>
                <input class='pixel-radio' type='radio' id='".$e->nazivtipa."'
                 name='brand'><label>".$e->nazivtipa."</label></li>";
            }
            ?>
</ul>
</div>
<div class="sidebar-filter">
<div class="top-filter-head">Categories-Colors</div>
<div class="common-filter">
<div class="head">Color</div>
<ul id="main-categories">
 <?php
            $color = vratiBoje();
            foreach ($color as $e){
                echo"<li class='filter-list'>
                <input class='pixel-radio' type='radio' id='".$e->nazivboje."'
                 name='brand'><label>".$e->nazivboje."</label></li>";
            }
            ?>

</ul>
</div>
   
    </div>
</div>
<div class="col-xl-9 col-lg-8 col-md-7">

<div class="filter-bar d-flex align-items-center">

            <div class="dropdown mr-5 filter-bar-dropdown">
            <button class="btn dropdown-toggle"
            type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Sort By Price 
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" id="lower">Lower Price</a>
                <a class="dropdown-item" id="higher">Higher Price</a>
            </div>
            </div>
        
                <div class="input-group filter-bar-search">
                <div class="form-outline ">
                    <input type="search" id="search" class="form-control" placeholder="Search Name.." />
                </div>
                <button type="button" class="btn" id="button_search">
                    <i class="fas fa-search"></i>
                </button>
                </div>

</div>


<section class="lattest-product-area pb-40 category-list">
<div class="row">  <!-- class row -->
     <!-- products -->
     <?php
    if(isset($_SESSION['korisnik'])){
           
        $klasa="add-to-cart-enabled";
    }
    else{
        $klasa="add-to-cart-disabled";
    }
     if(isset($_SESSION['itemsbyCat'])){
         $items = $_SESSION['itemsbyCat'];
         
         if(basename($_SERVER['PHP_SELF']) != $_SESSION["itemsbyCat"]) {
            unset($_SESSION['itemsbyCat']);
         }
     }
     else{
         $items = vratiSveProducte();
     }  
     foreach($items as $p):
        ?>
        <div class="col-md-6 col-lg-4">
                    <div class="card text-center card-product ">
                                    <div class="card-product__img">
                                    <img class="card-img" src="img/products/<?= $p->link?>" alt="<?= $p->text?>">
                                        <ul class="card-product__imgOverlay">
                                        <!--  href="single_product.php" -->
                                        <li>
                                            <a href="single_product.php">
                                        <button class="button_single" data-id="<?= $p->id_proizvod?>">
                                        <i class="ti-search"></i></button></a></li>
                                        <li><button class="<?=$klasa?>" data-id="<?= $p->id_proizvod?>">
                                            <i class="ti-shopping-cart"></i></button></li>
                                    </ul>
                                    </div>
                                <div class="card-body">
                                <p><?= $p->nazivtipa?></p>
                                <h4 class="card-product__title"><?= $p->naziv?></h4>
                                <p class="card-product__price"> $<?= $p->cena?></p>
                                <p><?= $p->dostupnost?></p>
                                <p style="display:none;"><?= $p->nazivboje?></p>
                                <i class="ti-world" style="color:var(--<?= $p->nazivboje?>);"></i>
                                </div>
                    </div>
            </div>
        <?php
        endforeach;
        ?>
    <!-- products -->
</div>
</section>

</div>
</div>
</section>
</div>
<?php
    @include('page_parts/footer.php');
    ?>


</body></html>