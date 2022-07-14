<?php



spl_autoload_register(function ($clase){      
        if(file_exists("../Modelos/$clase.class.php"))
            require "../Modelos/$clase.class.php";    
        if(file_exists("../Controladores/$clase.class.php"))
            require "../Controladores/$clase.class.php";   

            //if(file_exists("../routing/$clase.class.php"))
            //require "../routing/$clase.class.php"; 

    });


    require_once "../util/sesiones.php";
    require_once "../util/config.php";
    require_once "../util/debug.php";
    