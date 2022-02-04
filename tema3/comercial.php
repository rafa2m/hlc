<?php
/**
 * Clase de ejemplo del patrón Singleton en PHP
 */
class Comercial{
    private $_nombre;
    private $_email;
    private $_direccion;
    private static $_comercial;
    //se evita el uso del constructor por defecto
    private function __construct(){}
    //se incluye un método estático para la construcción
    //del único objeto de la clase
    public static function getComercial(): Comercial{
        if(self::$_comercial==null){
            self::$_comercial=new Comercial();
        }
        return self::$_comercial;
    }
    //métodos getter y setters de las propiedades de la clase
    public function getNombre(){return $this->_nombre;}
    public function getEmail(){return $this->_email;}
    public function getDireccion(){return $this->_direccion;}
    public function setNombre($nombre){$this->_nombre=$nombre;}
    public function setEmail($email){$this->_email=$email;}
    public function setDireccion($direccion){$this->_direccion=$direccion;}
}
?>