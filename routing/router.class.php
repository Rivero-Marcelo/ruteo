<?php

class Router {

    
    public static $rutasGet = array();
    public static $rutasPost = array();
    public static $requestUrl = array();



    //public static $rutas = array();


    private static $urlActual;
    private static $metodoUrl;


public static function get($url, $funcion, $vista){

    array_push(self::$rutasGet, [
        'url' => $url,
        'funcion' => $funcion,
        'vista' => $vista
    ]);

}

public static function post($url, $funcion){

    array_push(self::$rutasPost, [
        'url' => $url,
        'funcion' => $funcion
    ]);


}
    

//public static function Add($url, $metodo, $funcion, $vista){

    //array_push(self::$rutas, [  
      //  'url' => $url,
        //'metodo' => $metodo,
        //'funcion' => $funcion,
        //'vista' => $vista
    //]);
   
   // echo "<pre>";
   // var_dump(self::$rutas);

//}

public static function Find(){

    self::$metodoUrl = strtolower($_SERVER['REQUEST_METHOD']);
    self::$requestUrl = parse_url($_SERVER['REQUEST_URI']);

    if(self::$metodoUrl === 'get'){
        foreach(self::$rutasGet as $ruta){
            if(self::$requestUrl['path'] === $ruta['url']){
                $rutaActual = [
                    'url' => $ruta['url'],
                    'metodo'=> 'get',
                    'funcion' => $ruta['funcion'],
                    'vista' => $ruta['vista'],
                    'query'=> self::$requestUrl['query']
                ]; 
                return $rutaActual;
            }                              // cierra if
         
        }
        return null;          // cierra foreach
    }                                      // cierra if

    if(self::$metodoUrl === 'post'){
        foreach(self::$rutasPost as $ruta){
            if(self::$requestUrl['path'] === $ruta['url']){
                $rutaActual = [
                    'url' => $ruta['url'],
                    'metodo' => 'post',
                    'funcion'=> $ruta['funcion'],
                ];
                return $rutaActual;
            }

        }
        return null;
    }

}  // cierra funcion



public static function BuscarRuta(){

    self::$urlActual = $_SERVER['REQUEST_URI'];
    self::$metodoActual = strtolower($_SERVER['REQUEST_METHOD']);

    foreach(self::$rutas as $ruta){

        if(in_array(self::$urlActual, $ruta) && self::$metodoActual === $ruta['metodo']){ 
            
            return $ruta;       
        }
    
    }
    
    return NULL;
}



public static function evaluarMetodo($resultado){

    if($resultado['metodo'] === 'get') return true;
    return false;
    

}


public static function Run(){

    $rutaActual = self::Find();

    if($rutaActual === NULL) VistaControlador::notFound();
    if($rutaActual['vista'] && !$rutaActual['query'])self::cargarVista($rutaActual['vista']);

    
    die();



    self::evaluarMetodo($resultado) ? self::cargarVista($resultado['vista']) : 
    self::cargarControlador($resultado['funcion']);

}


private static function cargarVista($vista){

    VistaControlador::mostrarPagina($vista,null);



}


private static function cargarControlador($funcion){

    $contexto = [
        'get' => $_GET,
        'post' => $_POST,
        'server' => $_SERVER,
        'session' => $_SESSION
    ];

    call_user_func($funcion,$contexto);

}



}