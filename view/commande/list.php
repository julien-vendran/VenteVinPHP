
<?php
$tabContent = '';
if ($tab_commande != false){
    foreach ($tab_commande as $commande){
        $tabContent .= '<tr>';
        foreach ($commande as $element){
            if (strcmp($commande['numCommande'], $element)==0)
                $tabContent .= '<td><a href="?action=detailCommande&numCommande=' . $element . '">' . $element . '</a></td>';
            else
                $tabContent .= '<td>' . $element . '</td>';
        }
        $tabContent .= '</tr>';
    }
}
?>

<div class="container">

    <h2>Liste de vos commandes</h2>

    <table>
        <thead>
        <tr>
            <th>Num Commande</th>
            <th>Date Commande</th>
            <th>Montant</th>
        </tr>
        </thead>
        <tbody>
            <?php echo $tabContent ?>
        </tbody>
    </table>

</div>