<!DOCTYPE html>
   
    <?php
    session_start();
    include "config/connection.php";
    include "modeli/fungcije.php";

    @include('page_parts/head.php');
    
    ?>
    

 <body>
    <header class="header_area fixed">
    <div class="main_menu nav-down">

    <?php
    @include('page_parts/nav.php');
    ?>
    
    </div>
    </header>
    
    <main class="site-main">
    <!--HERO-BANNER-->
    <section class="hero-banner">
    <div class="container">
    <div class="row no-gutters align-items-center pt-60px">
    <div class="col-5 d-none d-sm-block">
    <div class="hero-banner__img">
    <img class="img-fluid" src="img/hero/hero.png" alt="hero-banner">
    </div>
    </div>
    <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
    <div class="hero-banner__content">
    <h4>Shop is fun</h4>
    <h1>Browse Our Premium Product</h1>
    <p>Us which over of signs divide dominion deep fill bring
     they're meat beho upon own earth without morning over third. 
     Their male dry. They are great appear whose land fly grass.</p>
    <a class="button button-hero" href="products.php">Browse Now</a>
    </div>
    </div>
    </div>
    </div>
    </section>
    
    <!--BANNER-->
    <section id="banner" class="section-margin mt-5">
        <div class="owl-carousel car owl-theme">
            <?php
            $banner = vratiBanere();
            foreach($banner as $b):
            ?>
             <div class="owl-item caritem hero-carousel__slide">
                <img src="img/banner/<?=$b->link?>" alt="<?=$b->text?>" class="img-fluid">
                <a href="#" class="hero-carousel__slideOverlay">
                <h3><?=$b->naslov?></h3>
                <p><?=$b->banneropis?></p>
                </a>
            </div>
            <?php
            endforeach;
            
            ?>

        
        </div>
            
            <div class="owl-dots"></div>

        </div>
    </section>
    <!--PRODUCTS-->
    <section class="section-margin calc-60px">
    <div class="container">
        <div class="section-intro pb-60px">
        <p>Popular Item in the market</p>
        <h2>Trending <span class="section-intro__style">Product</span></h2>
        </div>
    <div class="row">
        <!-- product -->
        <?php

        @include('page_parts/products_part.php');
        ?>
        <!-- page change -->

         <!-- product -->
    
    </div> <!-- row -->
    </div> <!-- container -->
    </section>
    <!--SHOP NOW-->
    <div id="sale-section" class="sectionbreak">
    </div>
    <section class="site-section">
        <div class="container">
          <div class="row large-gutters">
            <div class="col-lg-6  shopnow-desc">
                <h4>Up To 20% Off</h4>
              <h1>This Year Summer Sale</h1>
                  <p>This anual market is open ounce again and the prices are sky rocketing far figh.
                      Hury up and chatch your premium product for a limited time.</p>
                  <ul class="list-unstyled ul-check success">
                    <li><i class="ti-angle-right"></i>Placeat maxime animi minus</li>
                    <li><i class="ti-angle-right"></i>omnis ullam pariatur itaque nisi</li>
                    <li><i class="ti-angle-right"></i>Placeat maxime animi minus</li>

                    <a class="button button--active mt-3 mt-xl-4" href="products.php">Shop Now</a>
                  </ul>
            </div>
            <div class="col-lg-6 mb-5">
                <div class="owl-carousel slide-one-item with-dots shopnow">
                    <div><img src="img/banner/banner1.png" alt="Image" class="img-fluid"></div>
                    <div><img src="img/banner/banner3.png" alt="Image" class="img-fluid"></div>
                  </div>
            </div>
          </div>
        </div>
      </section>
      
    <section class="section-margin calc-60px" id="bestsellers">
    <div class="container">
        <div class="section-intro pb-60px">
        <p>Popular Item in the market</p>
        <h2>Best <span class="section-intro__style">Sellers</span></h2>
        </div>
   
    <div class="owl-carousel salles owl-theme">
    <!-- best sellers -->
        <?php
        if(isset($_SESSION['korisnik'])){
           
            $klasa="add-to-cart-enabled";
        }
        else{
            $klasa="add-to-cart-disabled";
        }

        $bestseller = vratiProizvodedruga();
        foreach($bestseller as $s):
        ?>
        <div class="item">
            <div class="card text-center card-product">
                <div class="card-product__img">
                <img class="img-fluid" src="img/products/<?=$s->link?>" alt="<?=$s->text?>">
                <ul class="card-product__imgOverlay">
                <!-- href="single_product.php" -->
                <li>
                    <a href="">
                    <button class="button_single" data-id="<?= $s->id_proizvod?>">
                        <i class="ti-search"></i>
                    </button></a></li>

                   <li>
                    <button class="<?=$klasa?>" data-id="<?= $p->id_proizvod?>">
                          <i class="ti-shopping-cart"></i></button></li>
                <li>
                </ul>
                </div>
                <div class="card-body">
                <p><?=$s->nazivtipa?></p>
                <h4 class="card-product__title"><?= $p->naziv?></h4>
                <p class="card-product__price">$<?=$s->cena?></p>
                <p><?= $s->dostupnost?></p>
                <p style="display:none;"><?= $p->nazivboje?></p>
                <i class="ti-world" style="color:var(--<?= $s->nazivboje?>);"></i>
                </div>
                </div>
        </div>
        <?php
        endforeach;
        ?>

        <!--ITMES-->
    </div>
    </section>
   
    <!--News-->
    <div id="news-section" class="sectionbreak">
    </div>
    <section class="blog">
      <div class="container">
      <div class="section-intro pb-60px">
    <p>Popular News</p>
    <h2>Ongoing <span class="section-intro__style">News</span></h2>
    </div>
        <div class="row">
          <?php
        $news = vratiVesti();
        foreach($news as $n):
        ?>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <div class="card card-blog">
                    <a href="">
                        <img src="img/news/<?=$n->link?>" alt="<?=$n->text?>" 
                    class="img-fluid"></a>
                        <div class="card-body">
                        <h2 class="font-size-regular">
                        <a class="text-dark"><?=$n->naziv?></a>
                        </h2>
                            <p><?=$n->opis?>
                        </div>
                    </div> 
            </div>
        
        <?php
        endforeach;
        ?>

          
        </div>
      </div>
    </section>
    <div id="contact-section" class="sectionbreak">
    </div>
    
    <section id="contact" class="mb-4">
    <div class="container">
    <div class="section-intro pb-60px">
    <p>We Want To Hear From You.</p>
    <h2>Our <span class="section-intro__style">Contact</span></h2>
    </div>
    </div>
   	<div class="container">
       <div class="row">
   		<div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center">
            <!-- form -->
            <form>
                  <div class="form-group col-lg-12">
 						   <input  class="form-control"  name="contactName" type="text"  
                            id="contactName" placeholder="Name" value=""/>
                            <p class="text-error"></p>
                  </div>
                  <div class="form-group col-lg-12">
	      			   <input class="form-control"  name="contactEmail" 
                         type="email" id="contactEmail" placeholder="Email" value="">
                         <p class="text-error"></p>
	               </div>
                  <div class="form-group col-lg-12">
	     				   <input  class="form-control"  name="number" 
                            type="text" id="number" placeholder="Contact Number" value="">
                            <p class="text-error"></p>
	               </div>                       
                  <div class="form-group col-lg-12">
	                 	<textarea name="contactMessage" id="contactMessage" 
                         placeholder="Message" rows="2" cols="30"></textarea>
                         <p class="text-error"></p>
	               </div>                      
                 <div class="form-group col-lg-12">
                     <button type="button" class="button button-login w-100 mt-4 mb-4"
                      id="button_contact">Send</button>
                      <p id="message_log"> </p>
                  </div>
      		</form> <!-- Form End -->



         </div> <!-- /col-left -->
         <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="single-footer-widget tp_widgets">
                <div class="ml-40">
                <p class="sm-head"><i class="ti-angle-right"></i>Head Office</p>
                <p>1600 Amphitheatre ParkwayMountain View,<br> CA94043 US</p>
                <p class="sm-head">
                <i class="ti-angle-right"></i>Phone Number
                </p>
                <p>Phone: (+63) 555 1212<br>
                    Mobile: (+63) 555 0100<br>
                    
                </p>
                <p class="sm-head">
                <i class="ti-angle-right"></i>
                Email
                </p>
                <p>
                ourcompanyinc@gmail.com<br>
                devian.shop@gmail.com
                </p>
                </div>
            </div>
        </div>

   		
   	</div> <!-- /row -->
       </div>
		
	</section> <!-- /contact -->
    
    </main>
    
   <?php
   @include('page_parts/footer.php');//footer

  ?>
   
    </body>
 </html>