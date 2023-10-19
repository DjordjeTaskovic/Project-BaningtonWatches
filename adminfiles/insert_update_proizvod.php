<html>
<?php
  session_start();
  include "../config/connection.php";
   include "../modeli/fungcije.php";
     if(!isset($_GET["id"]) || !isset($_SESSION["korisnik"]) || $_SESSION["korisnik"]->naziv!="admin"){
  header("Location: ../errors/403.php");
  }else{
      $idproizvoda = $_GET["id"];
     // var_dump( "ID=>".$id);
 
         $priprema = vratiKorisnika_id($idproizvoda);
         if($priprema->rowCount()!=1){
             header("Location: ../errors/404.php");
         }

         //insert /update back-end
         //ankete
         //contact
         
  }
  ?>
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="Banington Watches,watches,Banington,store,quartc, luxury" />
  <meta name="description" content="Only the finest products you can find on this very page.
  Pletera of watches tosetisfi all your needs." />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <meta name="copyright" content="Djordje Taskovic @ 2021." />
  <meta name="author" content="mailto:djordje.taskovic123@gmail.com" />

    <title>admin_insert_delete</title>



    <link rel="icon" href="../img/hero/page-icon.png" type="image/png">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/themify-icons.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
     crossorigin="anonymous"/>
</head>
<body>

<header class="header_area">
<div class="main_menu">

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
    <a class="navbar-brand logo_h" href="index.php">Banington Watches</a>
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
                                    echo "<li class='nav-item active'><a class='nav-link' href='../".$n->link."'>
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
                                    echo "<li class='nav-item'><a class='nav-link' href='../".$n->link."'>
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
                     echo "<li class='nav-item'><a class='nav-link' href='../".$n->link."'>
                    ".$n->text."</a></li>";
                     }
                    ?> 
            </ul>
    </li>
                    <?php
                         $nav = navpoID(6,7);
                         foreach($nav as $n){
                             echo "<li class='nav-item'><a class='nav-link' href='../".$n->link."'>
                             ".$n->text."</a></li>";
                                }
                    ?> 
     <li class='nav-item'><a class='nav-link' href='../admin.php'>Admin-page</a></li>
        </ul>
    <ul class="nav-shop">
   
    <?php
        if(isset($_SESSION['korisnik'])){
            echo "
            <li class='nav-item'><a href='../cart.php'><i class='ti-shopping-cart'></i></a></li>
            <li class='nav-item'>
            <a id='logout-button' href='../modeli/logout.php'>
            <i class='ti-shift-right'></i></a></li>
            
            ";
        }
        else{
            echo" <li class='nav-item'><a href='../register.php'><i class='ti-flag-alt'></i></a></li>
            <li class='nav-item'><a href='../login.php'><i class='ti-user'></i></a></li>
           ";

        }
    ?>
   
    </ul>
    </div>
    </div>
    </nav>
</div>
</header>
<section>
<div class="container mt-5 pt-2">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center">
            <!-- form -->
            <form>
            <div class="form-group col-lg-12">
 						<h3>Insert Item</h3>
                  </div>
                  <div class="form-group col-lg-12">
 						   <input class="form-control" type="text" id="insertname" placeholder="Name">
                            <p class="text-error"></p>
                  </div>
                  <div class="form-group col-lg-12">
	      			   <input class="form-control"  type="number" id="insertprice" placeholder="Price">
                         <p class="text-error"></p>
	               </div>        
                   <div class="form-group col-lg-12">
                        <textarea class="form-control" id="insertdesc" rows="3" placeholder="Description">
                        </textarea>
                        <p class="text-error"></p>
                    </div>
             
                    <div class="form-group col-lg-12">
                        <select id="inserttip" class="form-control">
                        <option value='0'>Category</option>
                        <?php 
                        $item=vratiTipove();
                        foreach($item as $i){
                        echo "<option value='$i->id_tip'>$i->nazivtipa</option>";
                        }?>
                        </select>
                       <p class="text-error"></p>
                        </div>

                            <!-- nsed -->
                            <div class="form-group col-lg-12">
                        <select id="insertboja" class="form-control">
                        <option value='0'>Color</option>
                        <?php 
                         $item=vratiBoje();
                        foreach($item as $i){
                        echo "<option value='$i->id_boja'>$i->nazivboje</option>";
                        }?>
                        </select>
                       <p class="text-error"></p>
                        </div>
                               <!-- nsed -->
                               <div class="form-group col-lg-12 dropdown">
                        <select id="insertpol" class="form-control">
                        <option value='0'>Gender</option>
                        <?php 
                         $item=vratiPol();
                        foreach($item as $i){
                        echo "<option value='$i->id_pol'>$i->nazivpola</option>";
                        }?>
                        </select>
                       <p class="text-error"></p>
                        </div>

                        <div class="form-group col-lg-12 dropdown">
                        <select id="insertdostupnost" class="form-control">
                        <option value='0'>Availability</option>
                        <option value='In Stock'>In Stock</option>
                        <option value='Unavailable'>Un-Available</option>


                        </select>
                       <p class="text-error"></p>
                        </div>

                                <div class="form-group col-lg-12">
                                <label >Image : </label>
                                <input type="file" id="insertslika" />
                                </div>
                        

                 <div class="form-group col-lg-12">
                     <button type="button" class="button button-login w-100 mt-4 mb-4" 
                     id="button_insert">Insert</button>
                      <div id="admin-message"></div>
                  </div>
      		</form> <!-- Form End -->
         </div>
         <!-- update -->
         <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center">
            <!-- form -->
            <form>
                 <div class="form-group col-lg-12">
 						<h3>Update Item</h3>
                  </div>
                  <?php
                 
                    $proizvodi = vratifilterpoID($idproizvoda,'p.id_proizvod');
                   // var_dump($proizvodi);
                    foreach($proizvodi as $p):
                    ?>
                  <div class='form-group col-lg-12'>
                    <input class='form-control' type='text' id='idproizvoda' value="<?=$p->id_proizvod?>">
                    <p class='text-error'></p>
                  </div>

                  <div class="form-group col-lg-12">
 						   <input class="form-control" type="text" id="updatename" value="<?=$p->naziv?>">
                            <p class="text-error"></p>
                  </div>

                  <div class="form-group col-lg-12">
	      			   <input class="form-control"  type="number" id="updateprice"  value="<?=$p->cena?>">
                         <p class="text-error"></p>
	               </div>        

                   <div class="form-group col-lg-12">
                        <textarea class="form-control" id="updatedesc" rows="3"><?=$p->opis?></textarea>
                        <p class="text-error"></p>
                    </div>
                         <!-- start -->
                         <div class="form-group col-lg-12">
                            <select id="updatetip" class="form-control">
                                <option value='<?=$p->id_tip?>'selected><?=$p->nazivtipa?></option>
                         <?php
                          $tip = vratiTipove();
                                foreach($tip as $t):
                                ?>
                                 <option value='<?=$t->id_tip?>'><?=$t->nazivtipa?></option>
                                    <?php
                                    endforeach;
                                    ?>
                            </select>
                                 <p class="text-error"></p>
                            </div>

                            <!-- nsed -->
                            <div class="form-group col-lg-12">
                                <select id="updateboja" class="form-control">
                                <option value='<?=$p->id_boja?>'selected><?=$p->nazivboje?></option>
                            <?php
                                $boja = vratiBoje();
                                foreach($boja as $t):
                                ?>
                                    <option value='<?=$t->id_boja?>'><?=$t->nazivboje?></option>
                                <?php
                                endforeach;
                                ?>
                                </select>
                                     <p class="text-error"></p>
                            </div>

                               <!-- nsed -->
                     <div class="form-group col-lg-12 dropdown">
                                <select id="updatepol" class="form-control">
                                <option value='<?=$p->id_pol?>'selected><?=$p->nazivpola?></option>
                            <?php
                          $pol = vratiPol();
                          foreach($pol as $t):
                              ?>
                            <option value='<?=$t->id_pol?>'><?=$t->nazivpola?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                       <p class="text-error"></p>
                     </div>

                         <!-- end -->
                        
                        <div class="form-group col-lg-12 dropdown">
                                <select id="updatedostupnost" class="form-control">
                                <option value='<?=$p->dostupnost?>'selected><?=$p->dostupnost?></option>
                                <?php 
                                    $dostupnost =vrati_Dostupnost();
                                    foreach($dostupnost as $d):
                                ?>
                                    <option value='<?=$d->dostupnost?>'><?=$d->dostupnost?></option>

                                <?php
                                    endforeach;
                                    ?>
                                </select>
                                <p class="text-error"></p>
                        </div>

                          <div class="form-group col-lg-12">
                                <div id="old-image">Existing-image :<?=$p->link?>
                                </div>
                                <input type="file" id="updateslika" />
                         </div>
                         <?php
                         endforeach;
                         ?>
                         <div></div>
                        

                 <div class="form-group col-lg-12">
                     <button type="button" class="button button-login w-100 mt-4 mb-4" 
                     id="button_update">Update</button>
                      <div id="admin-message"></div>
                  </div>
      		</form> <!-- Form End -->
         </div>


</div>
</div>
</section>
<footer class="footer">
    <div class="footer-area">
    <div class="container">
    <div class="row section_gap">
        <div class="col-md-6 col-sm-12">
            <div class="single-footer-widget tp_widgets">
            <h4 class="footer_title large_title">Our Mission</h4>
            <p>
            So seed seed green that winged cattle in. Gathering thing made fly you're no
            divided deep moved us lan Gathering thing us land years living.
            </p>
            <p>
            So seed seed green that winged cattle in. Gathering thing made fly you're no divided deep moved
            </p>
            </div>
        </div>

            <div class=" col-md-6 col-sm-12">
                <div class="single-footer-widget tp_widgets">
                <h3 class="footer_title">Information</h3>
                <h4 class="footer_title">Working hours</h4>
                <ul class="list">
                <li><i class="ti-angle-right"></i><a href="#">Monday-Friday: 9am-8pm</a></li>
                <li><i class="ti-angle-right"></i><a href="#">Saturday: 9 am-5pm</a></li>
                <li><i class="ti-angle-right"></i><a href="#">Sunday: closed</a></li>
                </ul>
                <h4 class="footer_title">Documentation</h4>
                <ul class='list'>
                <li><i class="ti-angle-right"></i><a href="doc.pdf">See Documentation Here</a></li>
                </ul>
                </div>
            </div>
            
    
    </div>
    </div>
    </div>
    <div class="footer-bottom">
    <div class="container">
    <div class="row d-flex">
    <p class="col-lg-12 footer-text text-center">
    
    Copyright ©<script>document.write(new Date().getFullYear());</script>
        </p>
    </div>
    </div>
    </div>
    </footer>
    <script src="../vendor/jquery/jquery-3.5.1.min.js"></script>

    <script src="../vendor/bootstrap/js/bootstrap.bundle.js"></script>

    <script src="../js/skrollr.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/main.js"></script>
    
    
    

</body>
</html>