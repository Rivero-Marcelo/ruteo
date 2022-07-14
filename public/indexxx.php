<?php

require "../util/autoload.php";


session_start();

$url = $_SERVER['REQUEST_URI'];
$metodo = $_SERVER['REQUEST_METHOD'];

switch($url){


    case "/":

        VistaControlador::mostrarPagina("Principal",null);
        break;
        

    case "/login":

        if($metodo === "GET") VistaControlador::mostrarPagina("FormularioLogin",null);
        if($metodo === "POST") UsuarioControlador::Login();
        break;

    case "/app/principal":

        VistaControlador::mostrarPagina("Principal",null);
        break;

    case "/app/usuarioAlta":

        if($metodo === "GET") VistaControlador::mostrarPagina("FormularioAltaUsuario",null);
        if($metodo === "POST") UsuarioControlador::Alta();
        break;

    case "/logout": 

        logout();
        break;

    default:

        echo "pero sos bobo";
        break;

}






