<html >
   <?php
   session_start();
     include "config/connection.php";
     include "modeli/fungcije.php";
   @include('page_parts/head.php')
   ?>

<body>

<header class="header_area">
<div class="main_menu">
<?php
   @include('page_parts/nav.php')
   ?>
</div>
</header>


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
            if(isset($_SESSION['singleitem'])):
               $item = $_SESSION['singleitem'];
               
               if (basename($_SERVER['PHP_SELF']) != $_SESSION["singleitem"]) {
                  unset($_SESSION['singleitem']);
               }
               // foreach($item as $s):
               ?>
                  <div class="col-lg-6 mb-5">
                  <div class="owl-carousel slide-one-item with-dots shopnow">
                        <div>
                        <img src='img/products/<?=$item->link?>' alt='<?=$item->text?>' class='img-fluid'>
                        </div>
                  </div>
               </div>
                  <div class="col-lg-6 shopnow-desc">
                           <div class="s_product_text">
                                 <h3><?=$item->naziv?></h3>
                                 <h2>$<?=$item->cena?></h2>
                                 <ul class="list">
                                 <li><span>Category</span>:<?=$item->nazivtipa?></li>
                                 <li><span>Availibility</span>:<?=$item->dostupnost?></li>
                                 <li><span>Color</span>: 
                                  <i class="ti-world" 
                                 style="color:var(--<?= $item->nazivboje?>);"></i></li>
                                 <li><span>Pol</span>:<?=$item->nazivpola?></li>
                                 </ul>
                                 <p><?=$item->opis?></p>
                                    <div class="product_count">
                                    <a class="button primary-btn" href="#"
                                     data-id="${nizitem[e].id_proizvod}">Add to Cart</a>
                                    </div>
                              </div>
      
                  </div>

               <?php
              // endforeach 
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
      <h4>Add a Review</h4>
      <p>Your Rating:</p>
         <ul class="list">
         <li><a href="#"><i class="fa fa-star"></i></a></li>
         <li><a href="#"><i class="fa fa-star"></i></a></li>
         <li><a href="#"><i class="fa fa-star"></i></a></li>
         <li><a href="#"><i class="fa fa-star"></i></a></li>
         <li><a href="#"><i class="fa fa-star"></i></a></li>
         </ul>
      <p>Outstanding</p>
         <form >
            <div class="form-group">
            <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name">
            <p class="text-error"></p>
            </div>
            <div class="form-group">
            <input class="form-control" name="subject" id="subject" type="text" placeholder="Enter Subject">
            <p class="text-error"></p>
            </div>
            <div class="form-group">
            <textarea class="form-control different-control" style="width:100%; max-height:140px;" 
            name="textarea" id="textarea" cols="20" rows="5" placeholder="Enter Message"></textarea>
            </div>
            <p class="text-error"></p>
            <div class="form-group text-center text-md-right mt-3">
            <button type="button" id="button_review"
             class="button button--active button-review">Submit Now</button>
            </div>
            <div id="review-confirm"></div>
         </form>
      </div>

   </div><!-- col-12 -->

   </div><!--row-->
   </div>
   </div>

</section>
<?php 
@include('page_parts/footer.php');
?>

</body></html>