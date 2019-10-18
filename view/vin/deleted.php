<?php

    echo("La Vin " . htmlspecialchars($immat) .
     " a bien été supprimée. <br>");
    require File::build_path(array('view','Vin','list.php'));
?>
