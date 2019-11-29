<!DOCTYPE html>
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
                            <input class = "white-text" type = 'text' size="4" value = "<?php echo htmlspecialchars($_SESSION['panierVin']['nombreBouteille'][$i])?>" max = "<?php echo $qteV?>">
                        </td>
                        <td>
                            <?php
                                $res = $_SESSION['panierVin']['nombreBouteille'][$i] * $_SESSION['panierVin']['prixVin'][$i];
                                echo $res;
                            ?>
                        </td>
                        <td>

                        </td>
                    </tr>



        <?php
                }

                echo "<tr><td colspan=\"2\"> </td>";
                echo "<td colspan=\"2\">";
                echo "Total : ".ModelPanier::MontantGlobal();
                echo "</td></tr>";

                echo "<tr><td colspan=\"4\">";
                echo "<input type=\"submit\" value=\"Rafraichir\"/>";
                echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

                echo "</td></tr>";
            }
        }
        ?>
    </table>
</form>
</body>
</html>

