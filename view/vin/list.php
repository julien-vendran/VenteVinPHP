<div class="row">
<?php
    foreach ($tab as $v) {
        $idVin = $v->get('idVin');
        $nomVin = $v->get('nomVin');
        $prixVin = $v->get('prixVin');
        $prixVin = $v->get('prixVin');
        $imgVin = $v->get('imageVin');
        $nbBouteille = $v->get('qteVin');
        if ($nbBouteille > 0) {
            /*ajouterArticle($idVin, $nombreBouteille,$prixVin) - - $_POST['idVin'], $_POST['qteVin'], $_POST['prixVin']*/
            ?>
            <div class="col s4 m2">
                <div class="card sizecard">
                    <a href="?action=readVin&idVin=<?php echo $idVin?>">
                        <div class="card-image sizeimg">
                            <img src="<?php echo $imgVin ?>">
                        </div>
                    </a>
                    <div class="card-content ">
                        <span class="black-text card-title"><?php echo $nomVin ?></span>
                        <p class="black-text"> <?php echo $prixVin ?>€ / bouteille</p>
                        <form action="index.php?action=ajouterVinPanier" method="post">
                            <label>Quantité</label>
                            <input type="number" step="1" min="0" max="<?php echo $nbBouteille ?>" name="qteVin"
                                   value="1" title="Qté" size="4" pattern="[0-9]*" inputmode="numeric">
                            <button class="btn-floating btn-large halfway-fab waves-effect waves-light red"
                                    type="submit">
                                <i class="material-icons">
                                    add_shopping_cart
                                </i>
                            </button>
                            <input type='hidden' name='idVin' value='<?php echo $idVin; ?>'>
                            <input type='hidden' name='prixVin' value='<?php echo $prixVin ?>'>
                            <input type='hidden' name='nomVin' value='<?php echo $nomVin ?>'>
                        </form>
                    </div>
                </div>
            </div>

            <?php
        } else { ?>
            <div class="col s4 m2 opacite08">
                <div class="card sizecard">
                    <div class="card-image sizeimg">
                        <img src="<?php echo $imgVin ?>">
                    </div>
                    <div class="card-content ">
                        <span class="black-text card-title"><?php echo $nomVin ?></span>
                        <p class="black-text"> <?php echo $prixVin ?>€ / bouteille</p>
                            <span class = "red-text">Victime de son succès</span>
                            <button class="btn-floating btn-large halfway-fab waves-effect waves-light red">
                                <i class="material-icons">
                                    close
                                </i>
                            </button>
                    </div>
                </div>
            </div>

    <?php
        }
    }
    ?>

</div>


