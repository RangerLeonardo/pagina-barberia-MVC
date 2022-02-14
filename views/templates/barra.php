<div class="barra">Bienvenido <?php echo $nombre ?? ""?>  
    <a class="boton" href="/logout">Cerrar Sesión</a>
</div>

<?php  if(isset($_SESSION["admin"])):?>
    <div class="barra-servicios">
        <a href="/admin" class="boton">Ver Citas</a>
        <a href="/servicios" class="boton">Ver Servicios</a>
        <a href="/servicios/crear" class="boton">Crear Servicios</a>
    </div>
        
 
<?php endif?>