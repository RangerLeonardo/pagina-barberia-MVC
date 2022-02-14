<?php

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class LoginController
{
    public static function login(Router $router)
    {
        $alertas = [];
        

        $auth = new Usuario();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $auth = new Usuario($_POST);

            $alertas = $auth->validarLogin();

            if (empty($alertas)) {

                //estamos comprobando que exista el correo en la base de datos
                $usuario = Usuario::where("email", $auth->email);


                if ($usuario) {
                    //verificar el password
                    if ($usuario->comprobarContraseñaYVerificado($auth->password)) {
                        //autenticar al usuario y pasarlo a la página
                        $_SESSION["id"] = $usuario->id;
                        $_SESSION["nombre"] = $usuario->nombre . " " . $usuario->apellido;
                        $_SESSION["email"] = $usuario->email;
                        $_SESSION["login"] = true;

                        //Redireccionando al usuario

                        if ($usuario->admin === "1") {
                            $_SESSION["admin"] = $usuario->admin ?? null;

                            header("Location: /admin");
                        } else {
                            header("Location: /cita");
                        }

                    };
                } else {
                    Usuario::setAlerta("error", "Usuario no registrado");
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render("auth/login", [
            "alertas" => $alertas,
            "auth" => $auth
        ]);
    }


    public static function logout(){
        $_SESSION=[];
        
        header("Location: /");
        
    }

    public static function olvide(Router $router)
    {
        $alertas=[];
        $correoEnviado=false;

        if($_SERVER['REQUEST_METHOD'] === "POST" ){

            $auth = new Usuario($_POST);

            $alertas=$auth->validarEmail();

            if(empty($alertas)){
                //es un metodo para buscar por columna que un valor exista
                $usuario= Usuario::where("email",$auth->email);

                if($usuario && $usuario->confirmado==="1"){

                    //generar token
                    $usuario->crearToken();
                    $usuario->guardar();

                    //enviar el email
                    $email=new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarInstrucciones();

                    //alerta de exito que se mandó el correo correctamente
                    Usuario::setAlerta("exito","Te hemos mandado un correo, revisa tu bandeja de entrada");
                    $correoEnviado=true;
                }
                //el correo no se mandó por algún fallo
                else{
                    Usuario::setAlerta("error","El usuario no existe o no ha confirmado su cuenta");
                }



            }

        }
        $alertas=Usuario::getAlertas();
        $router->render("auth/recuperar_contraseña",[
            "alertas" => $alertas,
            "correoEnviado"=>$correoEnviado
        ]);

    }


    public static function recuperar(Router $router){

        $alertas=[];

        $modificaronToken = false;

        //leemos el token 
        $token = s($_GET["token"]);

        //buscamos al usuario por su token en la BD

        $usuario = Usuario::where("token",$token);

        if(empty($usuario)){
            Usuario::setAlerta("error","Esta cuenta ya no existe o estás modificando el token");

            $modificaronToken=true;
        }

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            //leer el nuevo password y guardarlo
            $passwordNuevo = new Usuario($_POST);
            $alertas = $passwordNuevo->validarNuevoPassword();

            if (empty($alertas)){
                $usuario->password = null;

                $usuario->password = $passwordNuevo->password;

                $usuario->hashPassword();

                $usuario->token = null;

                $usuario->crearToken();

                $resultado = $usuario->guardar();

                if($resultado){
                    header("Location: /");
                }





            }

        }

        

        $alertas=Usuario::getAlertas();
        $router->render("auth/fin-restablecer", [
            "alertas"=> $alertas,
            "modificaronToken" =>$modificaronToken
        ]);
    }



    public static function crear(Router $router)
    {

        $usuario = new Usuario($_POST);

        //alertas vacias
        $alertas = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarCuentaNueva();


            //Revisar que alertas esté vacio
            if (empty($alertas)) {
                //Verificar que el usuario no esté registrado
                $resultado = $usuario->existeUsuario();

                if ($resultado->num_rows) {
                    $alertas = Usuario::getAlertas();
                } else {
                    //hashear el password
                    $usuario->hashPassword();

                    //Generar un token único
                    $usuario->crearToken();

                    //enviar el email con el token
                    $email = new Email($usuario->nombre, $usuario->email, $usuario->token);

                    $email->enviarConfirmación();

                    //crear el id del usuario
                    $resultado = $usuario->guardar();
                    if ($resultado) {
                        header("Location: /mensaje");
                    }
                }
            }
        }







        $router->render("auth/crear_cuenta", [
            "usuario" => $usuario,
            "alertas" => $alertas
        ]);
    }



    public static function mensajeC(Router $router)
    {
        $router->render("auth/mensaje");
    }

    public static function confirmar(Router $router)
    {

        $alertas = [];

        $token = s($_GET["token"]);


        $usuario = Usuario::where("token", $token);

        if (empty($usuario)) {
            //mostrar mensaje de error
            Usuario::setAlerta("error", "Código Expirado");
        } else {
            //confirmando en base de datos
            $usuario->confirmado = "1";
            //poniendolo nulo para que no puedan hacer operaciones maliciosas con el token
            $usuario->token = null;
            //guardandolo en la base de datos
            $usuario->guardar();

            //enviando el mensaje de que fue éxitoso
            Usuario::setAlerta("exito", "Verificación Confirmada");
        }
        $alertas = Usuario::getAlertas();
        $router->render("auth/confirmar_cuenta", [
            "alertas" => $alertas
        ]);
    }
}
