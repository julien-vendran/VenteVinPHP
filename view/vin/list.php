<?php
    foreach ($tab_v as $v) {
        $immat = $v->getImmatriculation();
        $immat2 = $immat;
        echo ""
        . "<p>"
        . "Vin d'immatriculation "
        . "<a href = \"?action=read&immat=" . rawurlencode($immat) . "\">"
        . htmlspecialchars($immat)
        . "</a>"
        . " -- "
        . "<a href = \"?action=update&immat=" . rawurlencode($immat) . "\">"
        . "Modifier"
        . "</a>"
        . " -- "
        . "<a href = \"?action=deleted&immat=" . rawurlencode($immat) . "\">"
        . "Supprimer"
        . "</a>"
        . "</p>";
    }
    echo "<a id=\"create\" href = \"?action=create\">Créer une autre Vin</a>";
?>
