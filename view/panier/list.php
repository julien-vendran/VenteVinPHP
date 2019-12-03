<!DOCTYPE html>
<?php
    if (isset($_GET['idVin']) && isset($_GET['nombreBouteile'])) {
        ModelPanier::modifierQTeArticle($_GET['idVin'], $_GET['nombreBouteile']);
        echo '<script>' .
                "window.location.replace('index.php?action=readPanier');" .
            '</script>';
    }
?>

<html lang="fr">
<head>
    <title>Votre panier</title>
</head>
<body>

<form method="post" action="list.php">
    <table style="width: 400px">
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
                            <input onchange="var id = '<?php echo $_SESSION['panierVin']['idVin'][$i]?>'; miseAJour(id, this.value)" class = "white-text" type = 'number' size="4" pattern="[0-9]*"  value = "<?php echo htmlspecialchars($_SESSION['panierVin']['nombreBouteille'][$i])?>" max = "<?php echo $qteV?>">
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
                    <td></td>
                    <td>
                        Total :
                    </td>
                    <td>
                        <?php echo ModelPanier::MontantGlobal()?> €
                    </td>
                </tr>

<!--
                echo "<tr><td colspan=\"2\"> </td>";
                echo "<td colspan=\"2\">";
                echo "Total : ". ModelPanier::MontantGlobal();
                echo "</td></tr>";

                echo "<tr><td colspan=\"4\">";
                echo "<input type=\"submit\" value=\"Rafraichir\"/>";
                echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

                echo "</td></tr>";-->
        <?php
            }
        }
        ?>
    </table>
</form>
</body>
<script type="text/javascript">
    function miseAJour (id, qte) {
        var url = 'index.php?action=readPanier&idVin='.concat(id);
        var urlqte = '&nombreBouteile='.concat(qte);
        //alert('passé'.concat(id));
        window.location.replace(url.concat(urlqte));
    }
</script>
</html>

