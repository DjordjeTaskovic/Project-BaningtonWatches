<?php
 session_start();
 header("Content-type: application/json");
 if(!isset($_SESSION["korisnik"]) || $_SESSION["korisnik"]->naziv!="admin"){
 header("Location: ../errors/403.php");
 }
 else{

 include "../config/connection.php";
 include "fungcije.php";
 $data=null;
  $code=404;

 if(isset($_POST["button"])){
    $idProizvod = $_POST["id"];
    $naziv = $_POST["naziv"];
    $cena = $_POST["cena"];
    $opis = $_POST["opis"];
    $idtip = $_POST["idtip"];
    $idboja = $_POST["idboja"];
    $idpol = $_POST["idpol"];
    $dostupnost = $_POST["dostupnost"];
    $slika = $_POST["slika"];

    // echo($slika);

                    $fun1 = izmeni_Proizvod($idProizvod,$naziv,$cena,$opis,$idtip,$idboja,$idpol,$dostupnost);
                    
                    $fun2 = Izmeni_Sliku($idProizvod,$slika);
                try {
                        global $conn;
                        $fun1->execute();
                        
                        $fun2->execute();
                        
                                $code=201;
                                $data=["poruka"=> "Update je uspesno uradjen."];
                 } catch(PDOExecption $e) {
                                $code=500;
                                $data=["poruka"=> "Došlo je do greške. Pokušajte kasnije."];
                         }

                        
  }else{
  $code=404;
 }

 echo json_encode($data);
 http_response_code($code);
}
?>