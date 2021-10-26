<?php
session_start();
    header("Content-type: application/json");
    include "../config/connection.php";
    include "fungcije.php";
$poruka=["poruka"=>""];
$product = "";
    if(isset($_POST['btn'])){
        
        try{
        $id = $_POST['idItem'];
        $search = $_POST['search'];
      // var_dump($id);
       var_dump( "na pocetku",$search);

                    if($id != null){

                        if($search =="pokreni"){
                                
                           // var_dump($id);
                             var_dump( "u search if-u",$search);

                             $kolona = 'p.naziv';
                             $product = vratifilterpoID($id,$kolona);
                           // var_dump("product",$product);
                            $poruka = ["poruka" =>"Sort po pretrazi je uredu."];

                        }
                        else if($search =="preskoci")
                           {
                            var_dump( "u search else-u",$search);

                            if($id == "Men"||$id == "Women"){
                                // var_dump($id);
                                // $poruka = ["poruka" =>"Id Je uredu."];
                                $kolona = "po.nazivpola";
                                $product = vratifilterpoID($id,$kolona);
                              //  var_dump($product);
                                 $poruka = ["poruka" =>"pol je dohvacen."];
                            }

                            if($id=="Smart Watch"|| $id=="Analog Watch"|| $id=="Quartz Watch"|| $id=="Luxury Watch"){
                                    $kolona="t.nazivtipa";
                                    $product = vratifilterpoID($id,$kolona);
                                 $poruka = ["poruka" =>"Tip je dohvacen."];

                                }

                            if($id=="bronze"|| $id=="black"|| $id=="red"|| $id=="blue"|| $id=="green"){
                                    $kolona="b.nazivboje";
                                    $product = vratifilterpoID($id,$kolona);
                                 $poruka = ["poruka" =>"Boja je dohvacena."];

                                }
                             if($id == "lower"){
                               //  var_dump("id",$id);
                                        $metod = 'ASC';
                                    $product = sortCena($metod);
                                 $poruka = ["poruka" =>"sortcenalower."];

                                }
                                if($id=="higher"){
                                   //  var_dump("id",$id);
                                    $metod = 'DESC';
                                    $product = sortCena($metod);
                             $poruka = ["poruka" =>"sortcenahigher."];

                                }
                           }
                                
                        }//null
                       $_SESSION['itemsbyCat'] = $product;
                       // var_dump( $_SESSION['itemsbyCat']);
                       
            }
            catch(PDOException $exception){
                $poruka = ["poruka" =>"Greska u bazi."];
            }
       
    }
    echo json_encode($poruka);
   
?>