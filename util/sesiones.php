<?php


function  VerificarSesion(){

    if(session_status() == PHP_SESSION_NONE ){
        echo "NOoooo HAY SESION"; 
        
    }
}

function SetValoresDeSesion($u){
    
    $_SESSION["usuario"] = $u->username;
    $_SESSION["autenticado"] = true;
    
}

function logout(){

    session_destroy();
    header("Location: /login");

}