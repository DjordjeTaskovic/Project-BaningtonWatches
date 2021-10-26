<?php

define("SERVER", "sql208.epizy.com");
define("DATABASE", "epiz_28106248_shopphp");
define("USERNAME", "epiz_28106248");
define("PASSWORD", "rItqSovr90CUX");

try {
    
    $conn = new PDO("mysql:host=".SERVER.";dbname=".DATABASE.";charset=utf8", USERNAME, PASSWORD);

    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $ex){
    echo $ex->getMessage();
}