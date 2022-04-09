<?php
if(isset($mensaje)){
  foreach ($mensaje as $mensaje) {
    echo '<div class="$mensaje" onclick="this.remove();">'.$mensaje.'</div>';
  }
};
?>