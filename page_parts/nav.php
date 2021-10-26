<?php

include "../config/connection.php";
include "../modeli/fungcije.php";

?>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
    <a class="navbar-brand logo_h" href="index.php">Banington Watches </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" 
    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
    <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                        <?php
                         $navdeo = navpoID(1,null);
                         // var_dump($navdeo);
                         foreach($navdeo as $n){
                                    echo "<li class='nav-item active'><a class='nav-link' href='".$n->link."'>
                                    ".$n->text."</a></li>";
                                }
                        ?> 
    <li class="nav-item submenu dropdown">

    <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
     aria-haspopup="true" aria-expanded="false"  href="">Shop</a>
             <ul class="dropdown-menu">
                <?php
                         $nav = navpoID(2,3);
                         foreach($nav as $n){
                                    echo "<li class='nav-item'><a class='nav-link' href='".$n->link."'>
                                    ".$n->text."</a></li>";
                                }
                    ?> 
            </ul>
    </li>
    <li class="nav-item submenu dropdown">
    <a href="" class="nav-link dropdown-toggle" 
    data-toggle="dropdown" role="button" aria-haspopup="true"
     aria-expanded="false">Blog</a>
            <ul class="dropdown-menu">
            <?php
                    $nav = navpoID(4,5);
                 foreach($nav as $n){
                     echo "<li class='nav-item'><a class='nav-link' href='".$n->link."'>
                    ".$n->text."</a></li>";
                     }
                    ?> 
            </ul>
    </li>
                    <?php
                         $nav = navpoID(6,7);
                         foreach($nav as $n){
                             echo "<li class='nav-item'><a class='nav-link' href='".$n->link."'>
                             ".$n->text."</a></li>";
                                }
                    ?> 
        </ul>
    <ul class="nav-shop">
    <?php
        if(isset($_SESSION['korisnik'])){
            echo "
            <li class='nav-item'><a href='cart.php'><i class='ti-shopping-cart'></i></a></li>
            <li class='nav-item'>
            <a id='logout-button' href='modeli/logout.php'>
            <i class='ti-shift-right'></i></a></li>
            ";
        }
        else{
            echo" <li class='nav-item'><a href='register.php'><i class='ti-flag-alt'></i></a></li>
            <li class='nav-item'><a href='login.php'><i class='ti-user'></i></a></li>
          ";

        }
    ?>
    </ul>
    </div>
    </div>
    </nav>