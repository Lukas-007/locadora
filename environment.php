<?php

if(    $_SERVER['HTTP_HOST'] == "localhost"
    || $_SERVER['HTTP_HOST'] == "127.0.0.1"
    || $_SERVER['HTTP_HOST'] == "localhost:8080"
    || $_SERVER['HTTP_HOST'] == "127.0.0.1:8080"
    || $_SERVER['HTTP_HOST'] == "locacao-de-veiculos"){
        define("ENVIRONMENT", "development");
}else{
    define("ENVIRONMENT", "production");
}
?>