<?php

require "../util/autoload.php";
require "../routing/router.class.php"; 
include "rutas.php";

session_start();

Router::Run();





//echo "<pre>";
//var_dump(Router::$rutas);

//echo "<br>";
//echo "<br>";

 //$r = 
 
 


 //echo "<pre>";
 //var_dump($r);