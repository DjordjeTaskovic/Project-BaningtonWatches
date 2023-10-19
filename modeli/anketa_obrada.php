<?php
 session_start();
 include "../config/connection.php";
 include "fungcije.php";
 header("Content-type: application/json");

 if(isset($_POST["button"])){

 $ime = $_POST["ime"];
 $opis = $_POST["opis"];
 $rating = $_POST["rating"];

 $data = '';
 $code = 404;
 $greske = 0;
        $userimeRe='/^([a-zA-Z0-9]{4,14})+$/';
    if(!preg_match($userimeRe, $ime)){
        $greske++;
        $data = ["poruka" => "Name is not in the right format."];
    }
   
    if(strlen($opis) < 3){
        $greske++;
        $data = ["poruka" => "Message must be greather then 3 charachteres."];
    }
    if($rating < 0){
        $greske++;
        $data = ["poruka" => "Rating must be selected."];
    }
    if($greske != 0)
    {
    $code = 422;
    }
        else{

            
            $anketa = upisi_Anketu($ime, $opis, $rating);
            try{
                $anketa;
                $data = ["poruka" =>"Subbmition was succesfull!"];
               $code=201;
            }
            catch(PDOException $ex)
            {
                $data = ["poruka" => "Server error."];
            $code = 500;
            }

            }
 }else{
 $code=404;
 }
 echo json_encode($data);
 http_response_code($code);
