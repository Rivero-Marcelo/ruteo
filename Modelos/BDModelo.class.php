<?php



class BDModelo {

public $hostDB = IP_DB;
public $usuarioDB = USER_DB;
public $passDB = PASS_DB;
public $DB = NAME_DB;

public $conexion; 


function __construct() {
    $this-> conexion = new mysqli($this->hostDB, $this->usuarioDB, $this->passDB, $this->DB);
}



}