<?php
echo '<ul>';
    foreach ($tab as $v) {
        $nomVin = $v->get('nomVin');
        $prixVin = $v->get('prixVin');
        echo ""
        . "<li>"
            . "<p>"
            . "Vin "
            . htmlspecialchars($nomVin)
            . "</p>"
        . "</li>";
    }
    echo '</ul>';
    echo "<a id=\"create\" href = \"?action=createVin\">Créer une autre Vin</a>";
