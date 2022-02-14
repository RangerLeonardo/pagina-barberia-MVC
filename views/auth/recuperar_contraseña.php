<h1 class="nombre-pagina">Recuperar Contraseña</h1>
<p class="descripcion-pagina">Restablece tu contraseña introduciendo tu email</p>

<?php 

    include_once __DIR__ . "/../templates/alertas.php";

?>

<?php if($correoEnviado) return; ?>

<form class="formulario" method="POST" action="/olvide">

    <div class="campo">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Correo">
    </div>

    <input type="submit" class="boton" value="Recuperar Contraseña">


</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta?  Inicia Sesión aquí</a>
    <a href="/crear_cuenta">Crear Cuenta</a>
</div>