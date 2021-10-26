<html>
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

<section>
        <?php
        if(!isset($_SESSION["korisnik"]) || $_SESSION["korisnik"]->naziv!="admin"){
            header("Location: errors/403.php");
            }
            else if(isset($_SESSION['korisnik'])):
                $korisnik =  $_SESSION['korisnik'];
          
                if($korisnik->naziv=="admin"):
          ?>
<div class="container mt-3">
<div class="row">
          <div class="col-12 pb-3 text-center">
                        <h3>All Products on Page</h3>
            </div>
       </div>
</div>
<div class="container-fluid" id="proizvodi">

<div class="col-12 mt-2 mb-2">
   <a class="button button hero mb-2" href="adminfiles/ankete.php">Reviews</a>
                <br>
   <a class="button button hero mb-2" href="adminfiles/kontakt.php">Contact Messages</a>
   <br>
   <a class="button button hero" href="adminfiles/insert_update_proizvod.php">Add new Product</a>

</div>

    <table class="table table-responsive">
        <tr>
            <th class="text-center" scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Modify Date</th>
            <th scope="col">Availability</th>
            <th scope="col">Settings</th>
        </tr>
    <?php
         $proizvodi =  vratiSveProducte();

        foreach($proizvodi as $p):
        ?>

    <tr>
    <td class="d-flex justify-content-center"> 
    <img class="w-25" src="img/products/<?= $p->link?>" alt="<?= $p->text?>"></td>
    <td><b><?=$p->nazivtipa?> </b><?= $p->naziv?></td>
    <td>$<?= $p->cena?></td>
    <td><?=$p->datum?></td>
    <td><?=$p->dostupnost?></td>
    <td>
    <a href="adminfiles/brisanje_proizvod.php?id=<?=$p->id_proizvod?>">Remove</a>
        <hr>
    <a href="adminfiles/insert_update_proizvod.php?id=<?=$p->id_proizvod?>">Modify</a></td>
    </tr>

    <?php 
    endforeach;
    ?>
    </table>
 </div>         


        <?php
        endif;
        endif;
        ?>
</section>
<?php
    @include('page_parts/footer.php');
 ?>

</body></html>