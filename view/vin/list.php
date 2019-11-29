<?php
echo '<ul>';?>
<div class="row">
<?php
    foreach ($tab as $v) {
        $nomVin = $v->get('nomVin');
        $prixVin = $v->get('prixVin');
        $descrVin = $v->get('descriptionVin');
        $imgVin = $v->get('imageVin');
        ?>
            <div class="col s4 m2">
                    <li> <!-- c dent une boucle-->
                        <div class="card">
                            <div class="card-image">
                                <img src="<?php echo $imgVin?>">
                                <a class="btn-floating btn-large halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                            </div>
                            <div class="card-content">
                                <span class="black-text card-title"><?php echo $nomVin?></span>
                                <p class = "black-text"><?php echo $descrVin?></p>
                            </div>
                        </div>
                </li>
            </div>

        <?php
    }
    ?>

</div>
<?php
    echo "<a id=\"create\" href = \"?action=createVin\">Créer une autre Vin</a>";