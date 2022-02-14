<?php

    foreach ($alertas as $key => $mensajesError):
            foreach ($mensajesError as $mensaje):

?>

<div class="alerta <?php echo $key; ?>" >

<?php echo $mensaje;?>

</div>

<?php
            endforeach;
        endforeach;
?>
