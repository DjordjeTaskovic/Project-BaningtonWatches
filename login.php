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
<?php
    if(isset($_SESSION['korisnik'])){
      $korisnik = $_SESSION['korisnik'];
      if($korisnik->naziv=="admin"){
        header("Refresh:0; url=admin.php");
      }
       
    }//isset
    if(isset($_SESSION['korisnik'])){
        $korisnik = $_SESSION['korisnik'];
        if($korisnik->naziv=="korisnik"){
          
        header("Refresh:0; url=index.php");
     }
         
 }//isset

    ?>
</header>


<section class="blog-banner-area" id="category">
<div class="container h-100">
<div class="blog-banner">
<div class="text-center">
<h1>Login</h1>
</div>
</div>
</div>
</section>
<section class="login_box_area section-margin">
<div class="container">
<div class="row d-flex justify-content-center">
<div class="col-lg-6 ">
<div class="login_form_inner">
<h3>Log in to enter</h3>
<form class="row login_form" action="#/" id="contactForm">

    <div class="col-md-12 form-group">
    <input type="text" class="form-control" id="name" name="name"
    placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
    <p class="text-error"></p>
    </div>
    
            <div class="col-md-12 form-group">
            <input type="password" class="form-control" id="password" name="name"
            placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
            <p class="text-error"></p>

            </div>
            <div class="col-md-12 form-group">
            <button type="button" id="login_btn" class="button button-login w-100">Log In</button>
            <p id="message_log"> </p>
            </div>
</form>
    
</div>
</div>
</div>
</div>
</section>


<?php
    @include('page_parts/footer.php');
    ?>

</body></html>