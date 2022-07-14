<?php


require "../util/autoload.php";

class VistaControlador {



    //public  static function generarHTML($pagina){

      //  self::mostrarPagina($pagina);


    //}


    public static function mostrarPagina($pagina, $parametros){

        include "../Vistas/$pagina.php" ; 

       // header("Location: /$pagina.php");


    }



    public static function notFound(){

      header("HTTP/1.0 404 Not Found");
        echo "<br><h1>404</h1></br>";
        die();

    }








}