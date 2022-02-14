<?php 

namespace Model;

class Servicio extends ActiveRecord{
    //base de datos
    protected static $tabla ="servicios";
    protected static $columnasDB =["id","nombre","precio"];

    public $id;
    public $nombre;
    public $precio;

    public function __construct($args=[])
    {
        $this->id= $args["id"] ?? null;
        $this->nombre= $args["nombre"] ?? "";
        $this->precio= $args["precio"] ?? "";

    }

    public function validar(){

        $noPrecio=!$this->precio;
        
        if(!$this->nombre){
            self::$alertas["error"][]="El nombre del servicio es obligatorio";
        }
        if($noPrecio){
            self::$alertas["error"][]="El precio del servicio es obligatorio";
        }elseif (is_numeric($noPrecio)) {
            self::$alertas["error"][]="Precio Invalido";

        }
            return self::$alertas;
    }


}