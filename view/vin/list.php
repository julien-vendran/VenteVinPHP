<?php
    foreach ($tab as $v) {
        $nomVin = $v->get('nomVin');
        echo ""
        . "<p>"
        . "Vin "
        . htmlspecialchars($nomVin)
        . "</p>";
    }
    echo "<a id=\"create\" href = \"?action=createVin\">Créer une autre Vin</a>";
