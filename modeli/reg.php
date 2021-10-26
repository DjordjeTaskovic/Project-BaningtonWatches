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
      //  echo($ime);
        $data = '';
        $code = '';

        $usernameRe='/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/';//Tonmawwq{12 karaktera}
        $adressRe='/^\w+(\s\w+)*$/';//123 Nasticeva Mike
        $passRe='/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';//min 8 karaktera, i jedan broj i jedno slovo:

                $greske = 0;
            if(!preg_match($usernameRe, $ime)){
                $greske++;
                $data = ["poruka" => "Ime nije uredu."];
           }
           if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $greske++;
            $data = ["poruka"=>"Email nije u dobrom formatu."];
            }
            if(!preg_match($adressRe, $adresa)){
                $greske++;
                $data = ["poruka" => "Adresa nije u dobrom formatu."];
             }
             if(!preg_match($passRe, $sifra)){
                $greske++;
                $data = ["poruka" => "Lozinka nije u dobrom formatu"];
           }

        if(strlen($sifra)<6){
           $data = ["poruka" => "Lozinka je manja od 6 karaktera."];
        }

        if($greske != 0)
        {
        $data = ["poruka" => "Greška u php-obradi."];
        $code = 422;
        }
        else{
                $sifra = md5($sifra);

                   $priprema = upisi_Korisnika($ime,$email,$adresa,$sifra,$datum,2);

                 try{
                  $priprema->execute();
                  $code=201;
                  $data=["poruka" =>"Uspešno ste se registrovali. Idite Na login stranu."];
                }
                catch(PDOException $ex)
                {
                $code = 500;
                $data = ["poruka" => "Korisnik sa tim email-om već postoji."];
                }
             }
     }else{
        $code = 404;
       
        }
        echo json_encode($data);
        http_response_code($code);

    
?>