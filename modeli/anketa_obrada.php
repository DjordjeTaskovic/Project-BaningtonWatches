<?php
 session_start();
 include "../config/connection.php";
 include "fungcije.php";
 header("Content-type: application/json");

 if(isset($_POST["button"])){

 $ime = $_POST["ime"];
 $tema = $_POST["tema"];
 $opis = $_POST["opis"];
 //  echo($ime);
 
 $data = '';
 $code = 404;

 $greske = 0;
        $userimeRe='/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/';//Tonma Qwwq

    if(!preg_match($userimeRe, $ime)){
        $greske++;
        $data = ["poruka" => "Ime nije u dobrom formatu."];
    }
    if(strlen($tema)<3){
        $greske++;
        $data = ["poruka" => "Tema naziv biti veci od 3 karaktera."];
    }
    if(strlen($opis)<3){
        $greske++;
        $data = ["poruka" => "Opis mora biti veci od 3 karaktera."];
    }
    if($greske != 0)
    {
    $data = ["poruka" => "Greška u php-obradi."];
    $code = 422;
    }
        else{

            
            $anketa = upisi_Anketu($ime,$tema,$opis);
          //  var_dump($anketa);
            try{
                $anketa;
                $data = ["poruka" =>"Uspešno upisana anketa."];
               $code=201;
            }
            catch(PDOException $ex)
            {
                $data = ["poruka" => "Problemsa podacima na serveru."];
            $code = 500;
            }

            }
 }else{
 $code=404;
 }
 echo json_encode($data);
 http_response_code($code);
?>
