<?php
 session_start();
 header("Content-type: application/json");

 include "../config/connection.php";
 include "fungcije.php";
 $data=null;
 $code=404;

 if(isset($_POST["proizvodi"]) && isset($_POST["id"])){
            $idKorisnik=$_POST["id"];
         global $conn;

        $upitSelect="SELECT * FROM korisnici WHERE id_korisnik = :id";
        $priprema=$conn->prepare($upitSelect);
        $priprema->bindParam(":id", $idKorisnik);
        $priprema->execute();

        if($priprema->rowCount()==1){

                try {
                       
                foreach($_POST["proizvodi"] as $p){

                    $idproizvoda = $p["id"];
                    $kolicina = $p["kolicina"];
                    $cena = $p["cena"];
                    $total = $p["total"];
                    $naziv = $p["naziv"];
                    $nazivtip = $p["nazivtip"];
                    $slika = $p["slika"];
                     upisi_Porudzbinu($idproizvoda,$idKorisnik,$kolicina,$cena,$total,$naziv,$nazivtip,$slika);
                  

                           }
                                $code=201;
                                 $data=["poruka"=> "Vaša narudžbina je prihvaćena."];
                                } catch(PDOExecption $e) {
                                $code=500;
                                $data=["poruka"=> "Došlo je do greške. Pokušajte kasnije."];
                                    }
 }
 else{
 $code=404;
 }

 }
 echo json_encode($data);
 http_response_code($code);
?>