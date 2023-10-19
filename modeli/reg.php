<?php
    session_start();
   include "../config/connection.php";
   include "fungcije.php";
  header("Content-type: application/json");

  if(isset($_POST["button"])){
       
        $ime = $_POST['ime'];
        $email = $_POST['mail'];
        $adresa = $_POST['adresa'];
        $sifra = $_POST['sifra'];
        $datum = $_POST['datum'];
        $data = '';
        $code = '';

        $usernameRe='/^([a-zA-Z0-9]{4,14})+$/';//Tonmawwq{12 karaktera}
        $adressRe='/^\w+(\s\w+)*$/';//123 Nasticeva Mike
        $passRe='/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';//min 8 karaktera, i jedan broj i jedno slovo:

                $greske = 0;
            if(!preg_match($usernameRe, $ime)){
                $greske++;
                $data = ["poruka" => "Name is not in the right format."];
           }
           if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $greske++;
            $data = ["poruka"=>"Email is not in the right format."];
            }
            if(!preg_match($adressRe, $adresa)){
                $greske++;
                $data = ["poruka" => "Adresa is not in the right format."];
             }
             if(!preg_match($passRe, $sifra)){
                $greske++;
                $data = ["poruka" => "Password is not in the right format."];
           }

        if(strlen($sifra) < 8){
           $data = ["poruka" => "Password is less then 8 charachters."];
        }

        if($greske != 0)
        {
        $code = 422;
        }
        else{
                $sifra = md5($sifra);

                   $priprema = upisi_Korisnika($ime,$email,$adresa,$sifra,$datum,2);

                 try{
                  $priprema->execute();
                  $code=201;
                  $data=["poruka" =>"Succesfull registration. Head over to the Login page!"];
                }
                catch(PDOException $ex)
                {
                $code = 500;
                $data = ["poruka" => "There has been an error on the server."];
                }
             }
     }else{
        $code = 404;
       
        }
        echo json_encode($data);
        http_response_code($code);
