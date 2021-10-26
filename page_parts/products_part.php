
<?php

include "../config/connection.php";
include "../modeli/fungcije.php";
//$proizvod = vratiCeleProizvode();
//var_dump($proizvod);
?>

<div id="first-page" class="row">
<?php
if(isset($_SESSION['korisnik'])){
           
    $klasa="add-to-cart-enabled";
}
else{
    $klasa="add-to-cart-disabled";
}

        $proizvod = vratiProizvodeprva();
        foreach($proizvod as $p):
        ?>
        <div class="col-md-6 col-lg-4 ">
                    <div class="card text-center card-product">
                                    <div class="card-product__img">
                                    <img class="card-img" src="img/products/<?= $p->link?>" alt="<?= $p->text?>">
                                        <ul class="card-product__imgOverlay">

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
                                <p class="card-product__price">$<?= $p->cena?></p>
                                <p><?= $p->dostupnost?></p>
                                <p style="display:none;"><?= $p->nazivboje?></p>
                                <i class="ti-world" style="color:var(--<?= $p->nazivboje?>);"></i>
                                </div>
                    </div>
            </div>
        <?php
        endforeach;
        ?>
</div>
<br>
<br>
<br>

<div id="second-page" class="row">
<?php
 if(isset($_SESSION['korisnik'])){
           
    $klasa="add-to-cart-enabled";
}
else{
    $klasa="add-to-cart-disabled";
}
        $proizvod = vratiProizvodedruga();
        foreach($proizvod as $p):
        ?>
        <div class="col-md-6 col-lg-4" >
                    <div class="card text-center card-product ">
                                    <div class="card-product__img">
                                    <img class="card-img" src="img/products/<?= $p->link?>" alt="<?= $p->text?>">
                                        <ul class="card-product__imgOverlay">
                                        <li><a href="single_product.php">
                                        <button class="button_single" data-id="<?= $p->id_proizvod?>">
                                        <i class="ti-search"></i></button></a></li>

                                        <li><button class="<?=$klasa?>" data-id="<?= $p->id_proizvod?>">
                                            <i class="ti-shopping-cart"></i></button></li>
                                    </ul>
                                    </div>
                                <div class="card-body">
                                <p><?= $p->nazivtipa?></p>
                                <h4 class="card-product__title"><?= $p->naziv?></h4>
                                <p class="card-product__price">$<?= $p->cena?></p>
                                <p><?= $p->dostupnost?></p>
                                <p style="display:none;"><?= $p->nazivboje?></p>
                                <i class="ti-world" style="color:var(--<?= $p->nazivboje?>);"></i>
                                </div>
                    </div>
            </div>
        <?php
        endforeach;
        ?>
</div>
 <div class="col-12 d-flex justify-content-center" id="page_change">
        <ul class="d-flex justify-content-center pagenumbers">
            <li><a  class="activenum" data-page="1"> 1 </a></li>
            <li><a  class="" data-page="2"> 2 </a></li>
        </ul>
</div>