<div class="row">
<?php
    foreach ($tab as $v) {
        $nomVin = $v->get('nomVin');
        $prixVin = $v->get('prixVin');
        $prixVin = $v->get('prixVin');
        $imgVin = $v->get('imageVin');
        ?>
            <div class="col s4 m2"> <!-- c dent une boucle-->
                        <div class="card sizecard">
                            <div class="card-image sizeimg">
                                <img src="<?php echo $imgVin?>">
                            </div>
                            <div class="card-content ">
                                <span class="black-text card-title"><?php echo $nomVin?></span>
                                <p class = "black-text"> <?php echo $prixVin ?>€ / bouteille</p>
                                <form action = "index.php">
                                    <input type="number" step="1" min="0" max="" name="quantity" value="1" title="Qté" size="4" pattern="[0-9]*" inputmode="numeric">
                                    <button class="btn-floating btn-large halfway-fab waves-effect waves-light red" type="submit">
                                        <i class="material-icons">
                                            add_shopping_cart
                                        </i>
                                    </button>

                                </form>
                            </div>
                        </div>
            </div>

        <?php
    }
    ?>

</div>
<?php
    echo "<a id=\"create\" href = \"?action=createVin\">Créer une autre Vin</a>";


