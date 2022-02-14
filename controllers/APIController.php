<?php

namespace Controllers;

use Model\Servicio;
use Model\Cita;
use Model\CitaServicio;

class APIController{
    public static function indexAPI(){
        $servicios = Servicio::all();
        echo json_encode($servicios);
    }

        public static function guardarCita(){

            //almacena la cita y devuelve el id
            $cita = new Cita($_POST);
            $resultado = $cita->guardar();
            $id = $resultado ["id"];

            //convierto un string y lo convierto a arreglo
            $idServicios= explode(",", $_POST["servicios"]);

            //y almacena los servicios con el id de la cita
            foreach($idServicios as $idServicio ){
                $args = [
                    "citaId" => $id,
                    "servicioId" => $idServicio
                ];
                $citaServicio = new CitaServicio($args);
                $citaServicio->guardar();
            }

            //almacena la cita y el servicio y retorna una respuesta
            $respuesta=[
                "resultado" =>$resultado
            ];


            echo json_encode($respuesta);

        }

        public static function eliminarCita(){
            
            if($_SERVER["REQUEST_METHOD"] === "POST"){
                $cita = Cita::find($_POST["id"]);
                $cita->eliminar();
                header("Location: ". $_SERVER["HTTP_REFERER"]);

            }

            
        }

}