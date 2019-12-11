<?php

    echo("Le Vin " . htmlspecialchars($idVin) .
     " a bien été supprimée. <br>");
    require File::build_path(array('view','Vin','list.php'));
