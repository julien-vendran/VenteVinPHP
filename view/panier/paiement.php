<?php

if(!Session::est_connecte()){
    echo 'Veuillez vous connectez pour pouvoir payer';
}
else{ ?>

    <p>
        Vous allez payer <?php echo ModelPanier::MontantGlobal();?>

        <a href="index.php?action=create"> Valider et payer la commande</a>
    </p>
<?php
}
