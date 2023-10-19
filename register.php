<html >
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


<section class="blog-banner-area" id="category">
<div class="container h-100">
<div class="blog-banner">
<div class="text-center">
<h1>Register</h1>
</div>
</div>
</div>
</section>
<section class="login_box_area section-margin">
<div class="container">
<div class="row d-flex justify-content-center">
<div class="col-lg-6">
<div class="login_form_inner register_form_inner">
<h3>Create an account</h3>

<form class="row login_form" id="register_form">

<div class="col-md-12 form-group">
<input type="text" class="form-control" id="name" name="name" 
placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
<p class="text-error"></p>
</div>
<div class="col-md-12 form-group">
<input type="text" class="form-control" id="email" name="email" 
placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'">
<p class="text-error"></p>

</div>
<div class="col-md-12 form-group">
<input type="text" class="form-control" id="adress" name="adress"
 placeholder="Adress" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adress'">
<p class="text-error"></p>

</div>
<div class="col-md-12 form-group">
<input type="text" class="form-control" id="password" name="password"
 placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
<p class="text-error"></p>

</div>
<div class="col-md-12 form-group">
<input type="text" class="form-control" id="confirmPassword" name="confirmPassword" 
placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'">
<p class="text-error"></p>

</div>
<div class="col-md-12 form-group">
<input type="date" class="form-control" id="date" name="date">
<p class="text-error"></p>

</div>
<div class="col-md-12 form-group">
<button type="button" id="register_btn" class="button button-register w-100">Register</button>
</div>
<div class="col-md-12 form-group">
    <p id="message"></p>
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