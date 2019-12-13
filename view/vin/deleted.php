<?php

    echo("<p class='p_centre'>Le Vin " . htmlspecialchars($idVin) . " a bien été supprimée. </p>");
    require File::build_path(array('view','Vin','list.php'));
