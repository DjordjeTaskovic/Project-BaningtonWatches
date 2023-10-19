<?php
 session_start();
// ob_start();
// include "..config/connection.php";
if(isset($_SESSION['korisnik'])){

unset($_SESSION['korisnik']);
header("Location: ../login.php");

}
?>