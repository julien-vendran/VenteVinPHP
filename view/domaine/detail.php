
<?php

    $immatriculation = $v->getImmatriculation();
    $marque = $v->getMarque();
    $couleur = $v->getCouleur();

    echo("Voiture " . htmlspecialchars($immatriculation)
    . " de marque " . htmlspecialchars($marque)
    . " (couleur " . htmlspecialchars($couleur)
    . "). <br>"
    . "<p>"
    . "<a href = \"?action=update&immat=" . rawurlencode($immatriculation) . "\">"
    . "Modifier"
    . "</a>"
    . " -- "
    . "<a href = \"?action=deleted&immat=" . rawurlencode($immatriculation) . "\">"
    . "Supprimer"
    . "</a>"
    . "</p>");
?>

