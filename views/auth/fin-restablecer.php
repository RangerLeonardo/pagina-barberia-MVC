<h1 class="nombre-pagina">Restablecer Contraseña</h1>

<p class="descripcion-pagina">Coloca tu Nueva Contraseña</p>

<?php 

    include_once __DIR__ . "/../templates/alertas.php";

?>

<?php if($modificaronToken) return; ?>
<form class="formulario" method="POST">

    <div class="campo">
        <label for="password" class="centrar">Contraseña Nueva</label>
        <input 
        type="password"
        id="password" 
        name="password"
        placeholder="Contraseña nueva"
        
        
        />

    </div>

    <input type="submit" class="boton" value="Guardar Cambios">
 
</form>



<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia sesión aquí</a>
    <a href="/crear_cuenta">¿Aún no tienes una cuenta? Crea una nueva cuenta aquí</a>



</div>