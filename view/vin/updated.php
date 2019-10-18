<?php

    echo("La Vin " . htmlspecialchars($values[0]) .
     " de marque " . htmlspecialchars($values[1]) .
     " et de couleur " . htmlspecialchars($values[2]) .
     " a bien été modifié et enregistré. <br>");
    require File::build_path(array('view','Vin','list.php'));
?>
