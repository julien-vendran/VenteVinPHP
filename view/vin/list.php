<?php
    foreach ($tab_v as $v){
        // echo '<p> Voiture d\'immatriculation <a href = "?action=read&immat=' . $v->getImmatriculation() . '">' . $v->getImmatriculation() . '</a> <a href = "?action=supprimerVoitureGET&immat='. $v->getImmatriculation() .'"> Supprimer la voiture </a></p>';
        $immat = $v->getImmatriculation();
//         echo <<< EOT
//         <p> 
//             Voiture d'immatriculation 
//             <a href = "?action=read&immat=$immat">
//                 $immat
//             </a>
//             <a href = "?action=supprimerVoitureGET&immat=$immat"> 
//                 Supprimer la voiture 
//             </a>
//         </p>
// EOT;
        $immat_url = rawurlencode($immat);
        $immat_hmtl = htmlspecialchars($immat);
        ?>
        <p> 
            Voiture d'immatriculation 
            <a href = "?action=read&immat=<?= $immat_url ?>">
                <?php echo $immat_hmtl ?>
            </a>
            <a href = "?action=supprimerVoitureGET&immat=<?php echo ($immat_url)?>"> 
                Supprimer la voiture 
            </a>
        </p>
        <?php
    }
        ?>