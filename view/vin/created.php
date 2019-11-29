<?php

    echo "Le Vin a bien été enregistré. <br>";
    echo "<p>Vous allez être redirigé dans 3 secondes</p>";
echo "<script type = 'text/javascript'>" .
        "setTimeout(function () {window.location.replace(\"index.php?action=readAllVins\")}, 3000);" .
    "</script>";