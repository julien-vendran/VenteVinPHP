<form method="get" action="">
    <fieldset>
        <legend> Modification </legend>
        <p>
            <label for="immat_id">Immatriculation</label> :
            <input type="text" name="immat" id="immat_id" value="<?php echo htmlspecialchars($v->getImmatriculation()); ?>" readonly="true"/>
            <label for="marque_id">Marque</label> :
            <input type="text" name="marque" id="marque_id" value="<?php echo htmlspecialchars($v->getMarque()); ?>"/>
            <label for="couleur_id">Couleur</label> :
            <input type="text" name="couleur" id="couleur_id" value="<?php echo htmlspecialchars($v->getCouleur()); ?>"/>
        </p>
        <input type='hidden' name='action' value='updated'>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset> 
</form>