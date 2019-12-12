<div class = "container center-align" style="text-align: center">
    <h1>Panneau d'administrateur </h1>
    <p>
        <a href = "?action=createViticulteur">
            <button class="btn-large waves-effect waves-light red">
                Créer un viticulteur
            </button>
        </a>
    </p>
    <p>
        <a href = "?action=createVin">
            <button class="btn-large waves-effect waves-light red">
                Ajouter un nouveau vin
            </button>
        </a>
    </p>
    <!--On veut permettre à l'administrateur de voir toutes les commandes passées-->
    <h2>Commandes passées sur le site pour le moment : </h2>
    <table>
        <thead>
            <td>Numéro de commande</td>
            <td>Date de la commande</td>
            <td>Login Acheteur</td>
            <td>Montant de la commande</td>
        </thead>
        <tbody>

        <?php
        foreach ($tab as $commande) {
            $id = $commande->get('idVin');
            ?>
            <tr>
                <td><?php echo htmlspecialchars($commande->get('numCommande'));?></td>
                <td><?php echo htmlspecialchars($commande->get('dateCommande'));?></td>
                <td><?php echo htmlspecialchars($commande->get('loginUtilisateur'));?></td>
                <td><?php echo htmlspecialchars($commande->get('montantCommande'));?></td>
            </tr>
            <?php
        }
        ?>

        </tbody>
    </table>
</div>
