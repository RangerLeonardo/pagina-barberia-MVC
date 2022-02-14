<?php

namespace Model;

class Usuario extends ActiveRecord{
    //base de datos
    protected static $tabla = "usuarios";
    protected static $columnasDB = ["id", "nombre", "apellido", "email", "password", "telefono", "admin", "confirmado", "token"];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $email;
    public $password;
    public $admin;
    public $confirmado;
    public $token;

    public function __construct($args = [])
    {

        //instancia del objeto que tenemos en la página, aquí se guardan los datos que escribimos
        $this->id = $args["id"] ?? null;
        $this->nombre = $args["nombre"] ?? "";
        $this->apellido = $args["apellido"] ?? "";
        $this->telefono = $args["telefono"] ?? "";
        $this->email = $args["email"] ?? "";
        $this->password = $args["password"] ?? "";
        $this->admin = $args["admin"] ?? 0;
        $this->confirmado = $args["confirmado"] ?? 0;
        $this->token = $args["token"] ?? "";
    }

    //validar la creación de la nueva cuenta

    public function validarCuentaNueva()
    {
        if (!$this->nombre) {
            self::$alertas["error"][] = "El nombre es obligatorio";
        }

        if (!$this->apellido) {
            self::$alertas["error"][] = "El apellido es obligatorio";
        }

        if (!$this->telefono) {
            self::$alertas["error"][] = "El telefono es obligatorio";
        }

        if (!$this->email) {
            self::$alertas["error"][] = "El email es obligatorio";
        }

        if (!$this->password) {
            self::$alertas["error"][] = "La contraseña es obligatoria";
        }

        if (strlen($this->password) < 4) {
            self::$alertas["error"][] = "Tu contraseña debe ser más larga";
        }




        return self::$alertas;
    }

    public function validarLogin()
    {

        if (!$this->email) {
            self::$alertas["error"][] = "El email es obligatorio";
        }

        if (!$this->password) {
            self::$alertas["error"][] = "La contraseña es obligatoria";
        }

        return self::$alertas;
    }


    public function validarEmail(){
        if (!$this->email) {
            self::$alertas["error"][] = "El email es obligatorio";
        }
        
        return self::$alertas;
    }


    public function validarNuevoPassword(){
        if(!$this->password){
            self::$alertas["error"][]="La contraseña es obligatoria";
        }
        
        elseif (strlen($this->password) < 6 ){
        self::$alertas["error"][]="La contraseña debe contener más de 6 cáracteres";
            
        }

        return self::$alertas;

    }






    //Revisa si el usuario ya existe
    public function existeUsuario()
    {
        //escribimos la consulta que queremos hacer a la base de datos y la guardamos en la variable query
        $query = " SELECT * FROM " . self::$tabla . " WHERE email= '" . $this->email . "'  limit 1";

        //hacemos la consulta a la base de datos y la escribimos en la variable resultado
        $resultado = self::$db->query($query);

        //si el resultado ya tiene un num_rows=1 significa que ya está registrado y mostramos la alerta al usuario
        if ($resultado->num_rows) {
            self::$alertas["error"][] = "Este usuario ya está registrado, inicia sesión o reestablece la contraseña";
        } else {
            //hashear el password


            //el usuario existe

        }

        //retorno el resultado
        return $resultado;
    }

    //para hasehar el password a 60 digitos y no sea "hackeable"    
    public function hashPassword(){
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    //crear el token para validar la cuenta que se va a crear
    public function crearToken(){
        $this->token = uniqid();
    }


    public function comprobarContraseñaYVerificado($password)
    {

        //va de nuevo, toma el password que nos da el usuario y el de la base de datos, comprueba que sean iguales y retorna true, si no, false

        $resultado = password_verify($password, $this->password);

        if ($resultado === false || !$this->confirmado) {

            if ($resultado === false) {
                self::$alertas["error"][] = "Contraseña incorrecta";
            }

            if (!$this->confirmado) {
                self::$alertas["error"][] = "Aún no confirmas tu cuenta";
            }
        } else {
            return true;
        }
    }
}
