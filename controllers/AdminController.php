<?php

namespace Controllers;

use Model\AdminCita;
use MVC\Router;

class AdminController{
    public static function indexAdmin(Router $router){

        isadmin();

        $fecha=$_GET["fecha"] ?? date("Y-m-d");
        $fechas=explode("-",$fecha);

        if(!checkdate($fechas[1],$fechas[2],$fechas[0])){
            header("Location: /404");
        }


        //consultar la base de datos para agarrar columnas con sus valores
        $consulta = "SELECT citas.id, citas.hora, CONCAT( usuarios.nombre, ' ', usuarios.apellido) as cliente, ";
        $consulta .= " usuarios.email, usuarios.telefono, servicios.nombre as servicio, servicios.precio, citas.fecha  ";
        $consulta .= " FROM citas  ";
        $consulta .= " LEFT OUTER JOIN usuarios ";
        $consulta .= " ON citas.usuarioId=usuarios.id  ";
        $consulta .= " LEFT OUTER JOIN citasServicios ";
        $consulta .= " ON citasServicios.citaId=citas.id ";
        $consulta .= " LEFT OUTER JOIN servicios ";
        $consulta .= " ON servicios.id=citasServicios.servicioId ";
        $consulta .= " WHERE fecha =  '${fecha}' ";

        //se trae los valores previamente consultados para poder mostrarlos
        //se muestran en la pagina adminIndex
        $citas = AdminCita::SQL($consulta); 


        //renderiza una vista que hace posible se vea la página y meustre todos los datos
        $router->render("admin/indexAdmin", [

            "nombre" => $_SESSION["nombre"],
            "citas" => $citas,
            "fecha" => $fecha

        ]);
    }
}
