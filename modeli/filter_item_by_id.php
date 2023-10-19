<?php
session_start();
    header("Content-type: application/json");
    include "../config/connection.php";
    include "fungcije.php";
$poruka="";
$code=404;
    if(isset($_POST['btn'])){
        
        $idItem = $_POST['idItem'];
        $product = "";
            try{
                if($idItem != 0){
                    $product = vratiproizvodpoID($idItem);
                    $poruka = ["poruka" =>"Upisano item u sesiju."];
                    $_SESSION['singleitem'] = $product;
                    
                    $code=200;
                }
            }
            catch(PDOException $exception){
                $poruka = ["poruka" =>"Greska u bazi."];
                $code=500;
                
            }
       
    }
    else{
        $code=404;

    }
    echo json_encode($poruka);
    http_response_code($code);
?>