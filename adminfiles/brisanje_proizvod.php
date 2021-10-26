<?php
 session_start();
 include "../config/connection.php";
  include "../modeli/fungcije.php";
    if(!isset($_GET["id"]) || !isset($_SESSION["korisnik"]) || $_SESSION["korisnik"]->naziv!="admin"){
 header("Location: ../errors/403.php");
 }else{
     $id = $_GET["id"];
   //  var_dump( "ID=>".$id);

        $priprema = vratiKorisnika_id($id);

        if($priprema->rowCount()!=1){

            header("Location: ../errors/404.php");
        }else{
            try{
               obrisiProizvod($id);
            //var_dump( "Proizvod Obrisan");
            header("Location: ../admin.php");

            }catch(PDOException $ex){
            var_dump( $ex->getMessage());
            }
    }
 }

?>