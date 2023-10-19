<html >
<?php
session_start();
    @include('page_parts/head.php');
?>
<body>

<header class="header_area">
<div class="main_menu">
<?php
  @include("config/connection.php");
  @include("modeli/fungcije.php");
    @include('page_parts/nav.php');
    ?>
</div>
</header>


<section class="blog-banner-area" id="category">
      <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                <h1>Author Page</h1>
                </div>
            </div>
      </div>
</section>
          <section id="author" class="container">
                     <div class="row jumblock mt-5 mb-5">
                     </div>
                      <div id="pageauthor" class="jumblock">
                        <div class=" container bg-white">
                        <div class="row text-center">
                          <div class="col-md-8">

                            <div class="row">
                              <div id="autext1" class="col-md-12 text-left mb-5 bborder">
                                  <blockquote>
                                      <i class="fas fa-quote-left"></i>
                                      Hi my name is Djordje Taskovic.
                                      I am a beginner when it comes to web design but keep my expectations 
                                      high and i am looking forward to progress even further . . .
                                       </blockquote>
                              </div>
                            </div>
                            <div class="row  d-flex justify-content-around">
                              <div id="autext2" class="col-lg-5 col-sm-12 " >
                                <h4 class="about">About</h4>
                                <div class="heading-underline"></div>

                                <p class="autextpromena">Young and passionate developer, 
                                  always happy to learn new things
                                   and evolve.
                                </p>

                              </div>
                              <div id="autext3" class="col-lg-5 col-sm-12 " >
                                  <h4 class="fieldofinterest">Field of Interest</h4>
                                  <div class="heading-underline"></div>
                                  <p class="autextpromena"> Intrested in 3D modeling, web design,
                                     photography, writing,
                                      drawing and learning new things.
                                  </p>
                              </div>

                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="row">
                              <div class="col-12">
                                  <img src="img/other/profil1.jpg" alt="profil">
                                
                              </div>
                              <div id="autext4" class="col-12">
                                  
                                  <h4 class="more" >More..</h4>
                                  <div class="heading-underline"></div>
                                 
                                  <p class="autextpromena"> In free time I love
                                     reding a good book or comic,
                                      watch series and movies etc.
                                  </p>
                                </div>
                            </div>
                            

                          </div>
                        </div>
                         
                        </div>
                      </div>
                      </section>




<?php
    @include('page_parts/footer.php');
    ?>

</body></html>