<?php

require "../util/autoload.php";

// Ruta::get($url, $funcion, $vista)


//Router::Add("/login", "get", null, "LoginVista");

//Router::Add("/login", "post", "UsuarioControlador::Login", null);

//Router::Add("/logout", 'get', "logout", null);

//Router::Add("/app/principal", "get", null, "Principal");


Router::get("/login", null, "LoginVista");

//Router::get("/login", "caca::caca", "LoginVista");