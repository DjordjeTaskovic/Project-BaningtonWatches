<?php

include "../config/connection.php";
include "../modeli/fungcije.php";

?>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand logo_h" href="index.php">Banington Watches </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                <?php
                $navdeo = navpoID(1, null);
                foreach ($navdeo as $n) {
                    echo "<li class='nav-item active'>
                    <a class='nav-link' href='" . $n->link . "' title='".$n->text."'>
                                    " . $n->text . "</a></li>";
                }
                ?>
                <li class="nav-item submenu dropdown">

                    <a class="nav-link dropdown-toggle" data-toggle="dropdown"
                     role="button" aria-haspopup="true"
                      aria-expanded="false" href="#"
                      title="Shop">Shop <i class="ti-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <?php
                        $nav = navpoID(2, 3);
                        foreach ($nav as $n) {
                            echo "<li class='nav-item'><a class='nav-link' href='" . $n->link . "'>
                                    " . $n->text . "</a></li>";
                        }
                        ?>
                    </ul>
                </li>
                <li class="nav-item submenu dropdown">
                    <a href="" class="nav-link dropdown-toggle"
                     data-toggle="dropdown" role="button"
                      aria-haspopup="true" aria-expanded="false" title="Blog">
                      Blog <i class="ti-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <?php
                        $nav = navpoID(4, 5);
                        foreach ($nav as $n) {
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='" . $n->link . "'>
                    " . $n->text . "</a></li>";
                        }
                        ?>
                    </ul>
                </li>
                <?php
                $nav = navpoID(6, 7);
                echo "<li class='nav-item'>
                                <a class='nav-link' href='" . $nav[0]->link . "' title='".$nav[0]->text."'>
                                    " . $nav[0]->text .
                    "</a>
                                </li>";
                echo "<li class='nav-item'>
                                <a class='nav-link' href='" . $nav[1]->link . "' title='".$nav[1]->text."'>
                                    " . $nav[1]->text .
                    "</a>
                                </li>";
                ?>
            </ul>
            <ul class="nav-shop">
                <?php
                if (isset($_SESSION['korisnik'])) {
                    echo "
            <li class='nav-item'>
            <a href='cart.php' title='Your cart'>
            <i class='ti-shopping-cart'></i></a></li>

            <li class='nav-item'>
            <a id='logout-button' href='modeli/logout.php' title='Logout'>
            <i class='ti-shift-right'></i></a></li>
            ";
                } else {
                    echo " <li class='nav-item'>
                    <a href='register.php' title='Register'>
                    <i class='ti-flag-alt'></i></a></li>
            <li class='nav-item'><a href='login.php' title='Login'>
            <i class='ti-user'></i></a></li>
          ";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>