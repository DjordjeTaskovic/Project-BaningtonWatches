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
             $greske = 0;
             $usernameRe = '/^([a-zA-Z0-9]{4,14})+$/';

                if(!preg_match($usernameRe, $userime)){
                    $greske++;
                    $data = ["poruka" => "Username is not in the right format."];
                }
                if(strlen($sifra) < 8){
                    $greske++;
                    $data = ["poruka" => "Password is not in the right format."];
                }
                if($greske != 0)
                {
                $code = 422;
                }
                 else{
                try {
                   
                        $sifra = md5($sifra);
                        $pripremaSve = vratiKorisnika($userime, $sifra);
                        $pripremaIme = vratiKorisnika_ime($userime);
                        $pripremaSifra = vratiKorisnika_sifra($sifra);

                        // ako je broj upisanih user-a razlicit od 1
                            if($pripremaIme->rowCount()!= 1){
                                $data=["poruka"=>"Username is wrong."];
                            $code=401;
                            }
                        
                            if($pripremaSifra->rowCount() != 1)
                            {
                            $data = ["poruka"=>"Password is wrong."];
                            $code = 401;
                            }
                            else
                            { 
                                 if($pripremaSve->rowCount()==1)
                                    {
                                    $rezultat = $pripremaSve->fetch();
                                    $data=["poruka"=>"You're now logged in!"];
                                    $code = 200;
                                    $_SESSION['korisnik'] = $rezultat;
                                    //  var_dump($rezultat);
                                    }else{
                                        $data=["poruka"=>"User with those kredentials doesn't exist."];
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
