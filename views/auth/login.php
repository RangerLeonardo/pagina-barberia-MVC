<h1 class="nombre-pagina">Login</h1>
<p class="descripcion-pagina">Inicia Sesión con tus Datos</p>

<?php 

    include_once __DIR__ . "/../templates/alertas.php";

?>

<form class="formulario" method="POST" action="/">
    <div class="campo">
        <label for="email">Email</label>
        <input type="email" id="email" placeholder="email" name="email" value="<?php echo s($auth->email);  ?>">
    </div>

    <div class="campo">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="contraseña" name="password" >
    </div>

    <input type="submit" class="boton" value="iniciar Sesión">

    <div class="acciones">
        <a href="/crear_cuenta">Crear Cuenta</a>
        <a href="/olvide">¿Olvidaste tu contraseña?</a>
    </div>


</form>