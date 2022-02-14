<?php 
namespace Controllers;

use Model\Servicio;
use MVC\Router;

class ServicioController{
// ---------------------------------------------------------------------

    public static function indexCRUD(Router $router){
        isAdmin();
        $servicios= Servicio::all();


        $router->render("/servicios/indexServicios",[
            "nombre"=> $_SESSION["nombre"],
            "servicios"=>$servicios
        ]);
    
    }


// ---------------------------------------------------------------------
    public static function crearServicios(Router $router){
        isAdmin();
        $servicio=new Servicio();
        $alertas=[];


        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $servicio->sincronizar($_POST);
            $alertas=$servicio->validar();

            if(empty($alertas)){
                $servicio->guardar();
                header("Location: /servicios");
            }
        }

         
        $router->render("/servicios/crear",[
            "nombre"=> $_SESSION["nombre"],
            "servicio" =>$servicio,
            "alertas" =>$alertas
        ]);
    }
// ---------------------------------------------------------------------


    public static function actualizarServicios(Router $router){
        isAdmin();
        if(!is_numeric($_GET["id"]))return;
        $servicio= Servicio::find($_GET["id"]);
        $alertas=[];

        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $servicio->sincronizar($_POST);
            $alertas=$servicio->validar();
            if(empty($alertas)){
                $servicio->guardar();
                header("Location: /servicios");
            }
        }

        $router->render("/servicios/actualizar",[
            "nombre"=> $_SESSION["nombre"],
            "servicio" =>$servicio,
            "alertas" =>$alertas
        ]);
    }
// ---------------------------------------------------------------------

    public static function eliminarServicios(){
        isAdmin();
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $id=$_POST["id"];
            $servicio= Servicio::find($id);
            $servicio->eliminar();
            header("Location: /servicios");
        }
    }

}