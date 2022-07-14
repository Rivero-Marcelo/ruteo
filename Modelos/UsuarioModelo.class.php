<?php


require "../util/autoload.php";


class UsuarioModelo extends BDModelo{

public $id;
public $username;
public $password;
public $fechaHoraDeRegistro;
public $fechaUltimaSesion;
public $horaUltimaSesion;



public function __construct($id=""){

    parent::__construct();

    if($id != ""){   
        $this->id = $id;
        $this->ObtenerPorID();
    }
}


public function ObtenerPorID() {
    
    $sql = "SELECT * FROM mvc_usuarios WHERE id = " . $this->id;
    $fila = $this-> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];
    $this -> id = $fila['id'];
    $this -> username = $fila['username'];

}


public function Guardar()
{
    if($this -> id == null){     
    $this->Insertar();
    }else $this->Actualizar();
}


private function Insertar(){
   
    $sql = "INSERT INTO mvc_usuarios (username, password, fechaHoraDeregistro) 
    VALUES ('" . $this->username . "', '" . $this -> passwordHash($this -> password) . "', '" . $this -> fechaHoraDeRegistro . "')";
    $this -> conexion -> query($sql);
}


public function Actualizar()
{
    $sql = "UPDATE mvc_usuarios SET
    username = '" . $this -> username . "',
    password = '" . $this -> password . "'
    WHERE id = " . $this -> id;
    $this -> conexion -> query($sql);

}

public function Eliminar(){
    $sql = "DELETE FROM mvc_usuario WHERE id = " . $this -> id;
    $this -> conexion -> query($sql);
}


private function passwordHash($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}


public function VerificarCredenciales(){
    
    $sql = "SELECT * FROM mvc_usuarios WHERE username = '" . $this -> username . "'";  
    $usuario = $this -> conexion -> query($sql);
    if($usuario -> num_rows == 0){return false;}

    $credenciales = $usuario -> fetch_assoc();
    $this -> id = $credenciales['id'];
    return $this -> ComprobarHash($credenciales['password']);

}

private function ComprobarHash($passwordHash){

return password_verify($this->password, $passwordHash);

}


public function setFechaHoraDeLogin(){

$this -> fechaUltimaSesion = date("Y-m-d");
$this -> horaUltimaSesion =  date("H:i:s", time());

$this -> ActualizaFechaHoraLog();

}

public function ActualizaFechaHoraLog(){

    $sql = "UPDATE mvc_usuarios SET
    fechaUltimaSesion = '" . $this -> fechaUltimaSesion . "',
    horaUltimaSesion = '" . $this -> horaUltimaSesion . "'
    WHERE id = " . $this -> id;
    $this -> conexion -> query($sql);


}



    
}
