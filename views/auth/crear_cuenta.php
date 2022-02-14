<h1 class="nombre-pagina">Crear Cuenta</h1>

<p class="descripcion-pagina">Llena el siguiente formulario para crear una cuenta</p>

<?php 

    include_once __DIR__ . "/../templates/alertas.php";

?>

<form class="formulario" method="POST" action="/crear_cuenta">

    <div class="campo">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre(s)"
        value="<?php echo s($usuario->nombre)?>">
    </div>

    <div class="campo">
        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido" placeholder="Apellido(s)"        value="<?php echo s($usuario->apellido)?>">
    </div>

    <div class="campo">
        <label for="telefono">Telefono</label>
        <input type="tel" id="telefono" name="telefono" placeholder="Telefono"        value="<?php echo s($usuario->telefono)?>">
    </div>

    <div class="campo">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Correo"        value="<?php echo s($usuario->email)?>">
    </div>

    <div class="campo">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" placeholder="Contraseña">
    </div>

    <input type="submit" value="Crear Cuenta" class="boton">


</form>


<div class="acciones">
        <a href="/">¿Ya tienes una cuenta?  Inicia Sesión aquí</a>
        <a href="/olvide">¿Olvidaste tu contraseña?</a>
    </div>