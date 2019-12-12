<?php
    $nom = $v->get("nomVin");
    $date = $v->get("anneeVin");
    $descr = $v->get("descriptionVin");
    $type = $v->get("typeVin");
    $prix = $v->get("prixVin");
    $qte = $v->get("qteVin"); // On pourrait le rendre modifiable genre il ajoute du stock
?>

<div class = "center-align white-text container">
    <h1> <?php echo htmlspecialchars($nom)?></h1>
    <table class = "centered">
        <tr>
            <td>Année</td>
            <td>Type</td>
            <td>Prix</td>
            <td>Quantité restante</td>
        </tr>
        <tbody>
            <tr>
                <td><?php echo htmlspecialchars($date)?></td>
                <td><?php echo htmlspecialchars($type)?></td>
                <td><?php echo htmlspecialchars($prix)?></td>
                <td><?php echo htmlspecialchars($qte)?></td>
            </tr>
        </tbody>
    </table>
    <h5>Descriprion actuelle : </h5>
    <?php echo htmlspecialchars($descr)?>
</div>
