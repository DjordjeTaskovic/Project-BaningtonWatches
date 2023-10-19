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

 if(isset($_POST["btn"])){

    $naziv = $_POST["naziv"];
    $cena = $_POST["cena"];
    $opis = $_POST["opis"];
    $idtip = $_POST["idtip"];
    $idboja = $_POST["idboja"];
    $idpol = $_POST["idpol"];
    $dostupnost = $_POST["dostupnost"];
    $slika = $_POST["slika"];

        // echo($slika);

                    $fun1 = upisi_Porizvod($naziv,$cena,$opis,$idtip,$idboja,$idpol,$dostupnost);
                    $slikaopis = "admin-inserted-slika";
                    $fun2 = upisi_Sliku($slika,$slikaopis);
                try {
                        global $conn;
                        $conn->beginTransaction();
                        //=
                        $fun1->execute();
                        $idProizvod = $conn->lastInsertId();
                        //=
                        $fun2->execute();
                        $idSlika = $conn->lastInsertId();
                        //=
                        $conn->query("INSERT INTO slika_proizvod VALUES(NULL, '$idProizvod', '$idSlika')");
                        //=
                        $conn->commit();
                                $code=201;
                                $data=["poruka"=> "Upisan je novi Proizvod."];
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