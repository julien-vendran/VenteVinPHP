<?php

    echo("La voiture " . htmlspecialchars($immat) .
     " de marque " . htmlspecialchars($marque) .
     " et de couleur " . htmlspecialchars($couleur) .
     " a bien été enregistré. <br>");
    require File::build_path(array('view','voiture','list.php'));
?>
