<h1 class="nombre-pagina">Crear Una Nueva Cita</h1>

<p class="descripcion-pagina">Bienvenido a la sección de citas, aquí podrás seleccionar un servicio o multiples servicios y agendar una cita en el día y tiempo que haya disponibilidad</p>

<?php
include_once __DIR__. "/../templates/barra.php";
?>

<div id="app">
    <nav class="tabs">
        <button type="button" data-paso="1" class="actual">Servicios</button>
        <button type="button" data-paso="2">Cita hora y fecha</button>
        <button type="button" data-paso="3">Resumen</button>
    </nav>

    <div id="paso-1" class="seccion">
        <h2>Servicios</h2>

        <p class="text-center">Elige tus servicios</p>

        <div id="servicios" class="listado-servicios"></div>

    </div>

    <div id="paso-2" class="seccion">
        <h2>Tus Datos y Cita</h2>
        <p class="text-center">Coloca la fecha de tu cita</p>

        <form class="formulario">

            <div class="campo">
                <label for="nombre">Nombre</label>
                <input id="nombre" type="text" value="<?php echo $nombre; ?>" disabled />
            </div>

            <div class="campo">
                <label for="fecha">Fecha</label>
                <input id="fecha" type="date" min="<?php echo date("Y-m-d", strtotime("+1 day")); ?>" />
            </div>

            <div class="campo">
                <label for="hora">Hora</label>
                <input id="hora" type="time" />
            </div>

            <input type="hidden" id="id" value="<?php echo  $id;?>">

        </form>

    </div>
    <div id="paso-3" class="seccion contenido-resumen">
        <h2>Resumen</h2>

        <p class="text-center">Verifica que todo esté en orden</p>

    </div>

    <div class="paginacion">
        <button id="anterior" class="boton">&laquo;Anterior</button>

        <button id="siguiente" class="boton">Siguiente&raquo;</button>
    </div>

</div>

<?php

$script = "
<script src='\\//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<script src='build/js/app.js'></script>"

?>