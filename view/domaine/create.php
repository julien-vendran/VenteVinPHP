<form method="get" action="">
    <fieldset>
        <legend> Création </legend>
        <p>
            <label for="immat_id">Immatriculation</label> :
            <input type="text" placeholder="Ex : 256AB34" name="immatriculation" id="immat_id" required/>
            <label for="marque_id">Marque</label> :
            <input type="text" placeholder="Ex : Audi" name="marque" id="marque_id" required/>
            <label for="couleur_id">Couleur</label> :
            <input type="text" placeholder="Ex : Bleu" name="couleur" id="couleur_id" required/>
        </p>
        <input type='hidden' name='action' value='created'>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset> 
</form>