<?php
 session_start();
 include "../config/connection.php";
 include "fungcije.php";
 header("Content-type: application/json");

 $data;
 $code = 404;
 if(isset($_POST["button"])){

 $userime = $_POST["ime"];
 $sifra = $_POST["sifra"];
 //  echo($ime);
             $greske = 0;
              $userimeRe='/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/';//Tonma Qwwq

                if(!preg_match($userimeRe, $userime)){
                    $greske++;
                    $data = ["poruka" => "Ime nije u dobrom formatu."];
                }
                if(strlen($sifra)<6){
                    $greske++;
                    $data = ["poruka" => "Lozinka nije u dobrom formatu."];
                }
                if($greske != 0)
                {
                $data = ["poruka" => "Greška u php-obradi."];
                $code = 422;
                }
                 else{
                try {
                   
                        $sifra = md5($sifra);
                        // var_dump('sifra',$sifra);
                        $pripremaSve = vratiKorisnika($userime, $sifra);
                    //  var_dump('vratiKorisnika',$test);
                        $pripremaIme = vratiKorisnika_ime($userime);
                        $pripremaSifra = vratiKorisnika_sifra($sifra);
                    //  var_dump('sifra_ubazi',$pripremaSifra);
                        // ako je broj upisanih user-a razlicit od 1
                            if($pripremaIme->rowCount()!= 1){
                                $data=["poruka"=>"Pogrešan username."];
                            $code=401;
                            }
                        
                            if($pripremaSifra->rowCount() != 1)
                            {
                            $data = ["poruka"=>"Pogrešna lozinka."];
                            $code = 401;
                            }
                            else
                            { 
                                 if($pripremaSve->rowCount()==1)
                                    {
                                    $rezultat = $pripremaSve->fetch();
                                    $data=["poruka"=>"Korisnik je ulogovan."];
                                    $code = 200;
                                    $_SESSION['korisnik'] = $rezultat;
                                    //  var_dump($rezultat);
                                    }else{
                                        $data=["poruka"=>"Korisnik sa tim podacima ne postoji u bazi"];
                                    $code=401;
                                    }
                                }

                }//try
                 catch (PDOException $th) {

                    $code=500;
                }

        }
 }//ifisset
 else{
 $code=404;
 }
 echo json_encode($data);
 http_response_code($code);
?>
