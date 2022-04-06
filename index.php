<?php
include 'conf.php';

if(!isset)
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<?php
if(isset($mensaje)){
  foreach ($mensaje as $mensaje) {
    echo '<div class="$mensaje" onclick="this.remove();">'.$mensaje.'</div>';
  }
}
?>
<div class="container">
  <div class="user-profile">
<?php

?>
  </div>
</div>
</body>
</html>