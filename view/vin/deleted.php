<?php

    echo("La voiture " . htmlspecialchars($immat) .
     " a bien été supprimée. <br>");
    require File::build_path(array('view','voiture','list.php'));
?>
