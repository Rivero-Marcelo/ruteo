<?php 


require_once "../util/autoload.php";


class UsuarioControlador {


public static function Alta(){
    
    $u = new UsuarioModelo();
    $u -> username = $_POST['username'];
    $u -> password = $_POST['password']; 
    $u -> fechaHoraDeRegistro = date("Y-m-d H:i:s");
    $u -> Guardar();
}

public function Baja(){
    
    $u = new UsuarioModelo($_GET['id']);
    $u -> Eliminar();

}

public function Modificacion(){

    $u = new UsuarioModelo($_POST['id']);
    $u -> username = $_POST['username'];
    $u -> password = $_POST['password'];
    $u -> Actualizar();

}


public static function Login(){

    $u = new UsuarioModelo();
    $u -> username = $_POST['username'];
    $u -> password = $_POST['password'];

    if($acceso = $u -> VerificarCredenciales()){

        //echo "llegue bien";

        SetValoresDeSesion($u);
        $u -> setFechaHoraDeLogin(); 
        //VistaControlador::mostrarPagina("Principal",null);
        header("Location: /app/principal");
    
    }else 
            VistaControlador::mostrarPagina("FormularioLogin",["error" => true]);

}


}