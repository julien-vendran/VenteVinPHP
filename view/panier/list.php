<?php
    if (isset($_GET['idVin']) && isset($_GET['nombreBouteile'])) {
        ModelPanier::modifierQTeArticle($_GET['idVin'], $_GET['nombreBouteile']);
        echo '<script>' .
                "window.location.replace('index.php?action=readPanier');" .
            '</script>';
    }
?>

<form method="post" id="panier" action="list.php">
    <table>
        <tr>
            <td colspan="4">Votre panier</td>
        </tr>
        <tr>
            <td>Libellé</td>
            <td>Quantité</td>
            <td>Prix Total</td>
            <td>Action</td>
        </tr>


        <?php
        if (ModelPanier::creationPanierVin())
        {
            $nbArticles=count($_SESSION['panierVin']['idVin']);
            if ($nbArticles <= 0)
                echo "<tr><td>Votre panier est vide </td></tr>";
            else
            {
                for ($i=0 ;$i < $nbArticles ; $i++)
                {
                    $v = ModelVin::select($_SESSION['panierVin']['idVin'][$i]);
                    $nomVin = $v->get('nomVin');
                    $qteV = $v->get('qteVin');
                ?>
                    <tr>
                        <td>
                            <p>Le vin <?php echo $nomVin?></p>
                        </td>
                        <td>
                            <input onchange="var id = '<?php echo $_SESSION['panierVin']['idVin'][$i]?>'; miseAJour(id, this.value)" class = "white-text" type = 'number' value = "<?php echo htmlspecialchars($_SESSION['panierVin']['nombreBouteille'][$i])?>" max = "<?php echo $qteV?>">
                        </td>
                        <td>
                            <?php
                                $res = $_SESSION['panierVin']['nombreBouteille'][$i] * $_SESSION['panierVin']['prixVin'][$i];
                                echo $res . " €";
                            /*type="number" step="1" min="0" max="<?php echo $nbBouteille?>" name="qteVin" value="1" title="Qté" size="4" pattern="[0-9]*" inputmode="numeric"*/
                            ?>
                        </td>
                        <td>
                            <a href="?action=supprimerVinPanier&idVin=<?php echo $_SESSION['panierVin']['idVin'][$i]?>"><i class="red-text material-icons">close</i></a>
                        </td>
                    </tr>



        <?php
                } ?>
                <tr>
                    <td colspan="2">
                        Total :
                    </td>
                    <td colspan="2">
                        <?php echo ModelPanier::MontantGlobal()?> €
                    </td>
                </tr>

        <?php
            }
        }
        ?>
    </table>
</form>

<?php
if(ModelPanier::MontantGlobal()!=0){
    ?>
    <div class="center-align" id="paye">
        <a href="index.php?action=paye">
            <button class="btn waves-effect waves-light">
                Payer
            </button>
        </a>
    </div>
<?php
}
?>

<script type="text/javascript">
    function miseAJour (id, qte) {
        var url = 'index.php?action=readPanier&idVin='.concat(id);
        var urlqte = '&nombreBouteile='.concat(qte);
        //alert('passé'.concat(id));
        window.location.replace(url.concat(urlqte));
    }
</script>

