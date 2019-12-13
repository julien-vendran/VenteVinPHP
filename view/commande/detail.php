
<?php
$tabContent = '';
foreach ($tab_ligneCommande as $ligneCommande){
    $tabContent .= '<tr>';
    foreach (array_reverse($ligneCommande) as $element){
        $tabContent .= '<td>' . $element . '</td>';
    }
    $tabContent .= '</tr>';
}
?>

<div class="container">

    <h2>Liste de vos commandes</h2>

    <table>
        <thead>
        <tr>
            <th>Nom Vin</th>
            <th>Prix Unitaire</th>
            <th>Quantité</th>
        </tr>
        </thead>
        <tbody>
            <?php echo $tabContent ?>
        </tbody>
    </table>

</div>