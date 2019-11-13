<?php
    foreach ($tab as $v) {
        $idVin = $v->get('idVin');
        echo ""
        . "<p>"
        . "Vin d'immatriculation "
        . "<a href = \"?action=readVin&$idVin=" . rawurlencode($idVin) . "\">"
        . htmlspecialchars($idVin)
        . "</a>"
        . " -- "
        . "<a href = \"?action=updateVin&$idVin=" . rawurlencode($idVin) . "\">"
        . "Modifier"
        . "</a>"
        . " -- "
        . "<a href = \"?action=deletedVin&$idVin=" . rawurlencode($idVin) . "\">"
        . "Supprimer"
        . "</a>"
        . "</p>";
    }
    echo "<a id=\"create\" href = \"?action=createVin\">Créer une autre Vin</a>";
