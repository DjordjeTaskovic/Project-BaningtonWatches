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
         @include('page_parts/nav.php')
         ?>
      </div>
   </header>
   <style>
      /* rating customization */
      .rating {
         unicode-bidi: bidi-override;
         direction: rtl;
      }

      .rating input {
         display: none;
      }

      .rating label {
         display: inline-block;
         padding: 5px;
         font-size: 24px;
         cursor: pointer;
      }

      .rating label:before {
         content: "\2605";
         padding: 5px;
         color: #888888;
      }

      .rating input:checked~label:before {
         color: blue;
      }
   </style>
   <section class="blog-banner-area" id="blog">
      <div class="container h-100">
         <div class="blog-banner">
            <div class="text-center">
               <h1>Shop Single</h1>
               <nav aria-label="breadcrumb" class="banner-breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Shop Single</li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </section>
   <section class="site-section">
      <div class="container">
         <div class="row large-gutters mt-5" id="single-item">
            <!-- single-item -->
            <?php

            if (isset($_SESSION['korisnik'])) {
               $klasa = "add-to-cart-enabled";
            } else {
               $klasa = "add-to-cart-disabled";
            }

            if (isset($_SESSION['singleitem'])) :
               $item = $_SESSION['singleitem'];
               if (basename($_SERVER['PHP_SELF']) != $_SESSION["singleitem"]) {
                  unset($_SESSION['singleitem']);
               }
            ?>
               <div class="col-lg-6 mb-5">
                  <div class="owl-carousel slide-one-item with-dots shopnow">
                     <div>
                        <img src='img/products/<?= $item->link ?>' alt='<?= $item->text ?>' class='img-fluid'>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6 shopnow-desc">
                  <div class="s_product_text">
                     <h3><?= $item->naziv ?></h3>
                     <h2>$<?= $item->cena ?></h2>
                     <ul class="list">
                        <li><span>Category</span>:<?= $item->nazivtipa ?></li>
                        <li><span>Availibility</span>:<?= $item->dostupnost ?></li>
                        <li><span>Color</span>:
                           <i class="ti-world" style="color:var(--<?= $item->nazivboje ?>);"></i>
                        </li>
                        <li><span>Pol</span>:<?= $item->nazivpola ?></li>
                     </ul>
                     <p><?= $item->opis ?></p>

                  </div>

               </div>

            <?php
            endif;
            ?>
         </div><!--row-->
      </div><!--container-->

   </section>

   <section class="product_description_area">
      <div class="container">
         <div class="tab-content" id="myTabContent"> <!--REVIEW-->

            <div class="row">
               <div class="col-lg-8" style="margin:0px auto;">
                  <div class="review_box">
                     <?php
                     if (isset($_SESSION['korisnik'])) :
                        $user = $_SESSION['korisnik'];
                        $username = $user->korisnik_ime;
                     ?>
                     <h4>Add a Review</h4>
                     <form>
                        <div class="rating">
                           <input type="radio" id="star5" name="rating" value="5">
                           <label for="star5"></label>
                           <input type="radio" id="star4" name="rating" value="4">
                           <label for="star4"></label>
                           <input type="radio" id="star3" name="rating" value="3">
                           <label for="star3"></label>
                           <input type="radio" id="star2" name="rating" value="2">
                           <label for="star2"></label>
                           <input type="radio" id="star1" name="rating" value="1">
                           <label for="star1"></label>
                           <p class="text-error" id="review-error"></p>
                        </div>
                        <div class="form-group">
                           <input class="form-control" 
                           name="name" id="name" 
                           
                           type="text"
                            placeholder="Enter your name" value="<?= $username ?>">
                           <p class="text-error"></p>
                        </div>

                        <div class="form-group">
                           <textarea class="form-control different-control"
                            style="width:100%; max-height:140px;" 
                            name="textarea" id="textarea" 
                            cols="20" rows="5" placeholder="Enter Message"></textarea>
                            <p class="text-error"></p>
                        </div>
                        <div class="form-group text-center text-md-right mt-3">
                           <button type="button" id="button_review" class="button button--active button-review">Submit Now</button>
                        </div>
                        <div id="review-confirm"></div>
                     </form>
                     <?php endif; ?>
                  </div>

               </div><!-- col-12 -->

            </div><!--row-->
         </div>
      </div>

   </section>
   <?php
   @include('page_parts/footer.php');
   ?>

</body>

</html>