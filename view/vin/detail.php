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
    <h5>Description</h5>
    <?php echo htmlspecialchars($descr);
    echo '<p>';
    if (isset($_SERVER['HTTP_REFERER']))
    echo "<a  class=\"waves-effect waves-light btn\" href=\"".$_SERVER['HTTP_REFERER']."\">" .
            "Retour" .
        "</a>";
    else
    echo '<a  class="waves-effect waves-light btn" href="index.php">' .
            'Retour vers l\'accueil' .
        '</a>';
    echo '</p>';
    ?>
</div>
