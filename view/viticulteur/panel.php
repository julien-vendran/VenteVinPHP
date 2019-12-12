<div class = "container">
    <div class = "center-align">
        <h1>Bienvenue sur votre page viticulteur</h1>
        <p>
            <a href = "?action=createVin">
                <button class="btn-large waves-effect waves-light red">
                    Proposer un nouveau vin
                </button>
            </a>
        </p>
    </div>

    <!--Un viticulteur peut modifier en temps réel-->
    <table class ="centered">
        <thead>
        <tr>
            <td>Nom</td>
            <td>Année</td>
            <td>Description</td>
            <td>Type / Couleur</td>
            <td>Médaille</td>
            <td>Prix</td>
            <td>Quantité</td>
            <td>Modifier</td>
        </tr>
        </thead>
        <tbody>

        <?php
            foreach ($tab as $vin) {
                $id = $vin->get('idVin');
                ?>
            <tr>
                <td><?php echo htmlspecialchars($vin->get('nomVin'));?></td>
                <td><?php echo htmlspecialchars($vin->get('anneeVin'));?></td>
                <td><?php echo htmlspecialchars($vin->get('descriptionVin'));?></td>
                <td><?php echo htmlspecialchars($vin->get('typeVin'));?></td>
                <td><?php
                    if ( ! empty($vin->get('medailleVin')))
                        echo htmlspecialchars($vin->get('medailleVin'));
                    else
                        echo 'aucune médaille'?>
                </td>
                <td><?php echo htmlspecialchars($vin->get('prixVin'));?></td>
                <td><?php echo htmlspecialchars($vin->get('qteVin'));?></td>
                <td><a href="?action=updateVin&idVin=<?php echo $id?>">Modifier</a></td>
            </tr>
        <?php
            }
        ?>

        </tbody>
    </table>
</div>
