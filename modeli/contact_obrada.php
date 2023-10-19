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
        $userimeRe = '/^([a-zA-Z0-9]{4,14})+$/';

    if(!preg_match($userimeRe, $ime)){
        $greske++;
        $data = ["poruka" => "Name is not in the right format."];
    }
    if(!preg_match("/^06\d{7,8}$/", $broj)){
        $greske++;
        $data = ["poruka" => "Phone is not in the right format."];

        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $greske++;
            $data = ["poruka" => "Email is not in the right format."];
    
        }
       
    if(strlen($poruka)<3){
        $greske++;
        $data = ["poruka" => "Message length must be bigger the 3."];
    }
    if($greske != 0)
    {
    $code = 422;
    }
        else{

            $kontact= upisi_ContactPoruku($ime,$email,$broj,$poruka);
          //  var_dump($anketa);
            try{
               $kontakt;
                $data = ["poruka" =>"The message has been sent sucessfuly!"];
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
?>
