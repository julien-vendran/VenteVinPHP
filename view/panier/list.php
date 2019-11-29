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
            <td>Prix Unitaire</td>
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
                    echo "<tr>";
                    echo "<td>".htmlspecialchars($_SESSION['panierVin']['idVin'][$i])."</ td>";
                    echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panierVin']['nombreBouteille'][$i])."\"/></td>";
                    echo "<td>".htmlspecialchars($_SESSION['panierVin']['prixVin'][$i])."</td>";
                    echo "<td><a href=\"".htmlspecialchars("panier.php?action=suppression&l=".rawurlencode($_SESSION['panierVin']['idVin'][$i]))."\">XX</a></td>";
                    echo "</tr>";
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

