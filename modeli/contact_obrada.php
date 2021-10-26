<?php
 session_start();
 include "../config/connection.php";
 include "fungcije.php";
 header("Content-type: application/json");

 if(isset($_POST["button"])){
    
 $ime = $_POST["ime"];
 $email = $_POST["email"];
 $broj = $_POST["number"];
 $poruka = $_POST["poruka"];

 //  echo($ime);
 
 $data = '';
 $code = 404;

 $greske = 0;
        $userimeRe="/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/";//Tonma Qwwq
    if(!preg_match($userimeRe, $ime)){
        $greske++;
        $data = ["poruka" => "Ime nije u dobrom formatu."];
    }
    if(!preg_match("/^06\d{7,8}$/", $broj)){
        $greske++;
        $data = ["poruka" => "Telefon nije u dobrom formatu"];

        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $greske++;
            $data = ["poruka" => "Email nije u dobrom formatu"];
    
        }
       
    if(strlen($poruka)<3){
        $greske++;
        $data = ["poruka" => "Opis mora biti veci od 3 karaktera."];
    }
    if($greske != 0)
    {
    $data = ["poruka" => "Greška u php-obradi."];
    $code = 422;
    }
        else{

            $kontact= upisi_ContactPoruku($ime,$email,$broj,$poruka);
          //  var_dump($anketa);
            try{
               $kontakt;
                $data = ["poruka" =>"Uspešno upisana kontakt poruka."];
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
