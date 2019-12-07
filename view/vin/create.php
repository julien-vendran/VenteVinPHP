<!--Il est pas perdu-->
<form method="get" action="">
    <fieldset>
        <legend> Création </legend>
        <p>
            <label for="nomVin_id">Nom</label> :
            <input type="text" placeholder="Ex : Chardonnay Vionnier" name="nomVin" id="nomVin_id" required/>

            <label for="anneeVin_id">Année</label> :
            <input type="text" placeholder="Ex : 2019" name="anneeVin" id="anneeVin_id" required/>

            <label for="descriptionVin_id">Description</label> :
            <input type="text" placeholder="Ex : Vin équilibré qui ..." name="descriptionVin" id="descriptionVin_id" required/>

            <label for="typeVin_id">Type</label> :
            <input type="text" placeholder="Ex : Blanc" name="typeVin" id="typeVin_id" required/>

            <label for="medailleVin_id">Médaille</label> :
            <input type="text" placeholder="Ex : Bronze" name="medailleVin" id="medailleVin_id"/>

            <label for="prixVin_id">Prix</label> :
            <input type="text" placeholder="Ex : 4.95€" name="prixVin" id="prixVin_id" required/>

            <label for="qteVin_id">Quantité en stock</label> :
            <input type="text" placeholder="Ex : 50" name="qteVin" id="qteVin_id" required/>

            <label for="image_id">Image</label> :
            <input type="text" placeholder="image.extension" name="image" id="image_id" required/>

            <label for="idDomaine_id">Domaine</label> :
            <input type="text" placeholder="Ex : Cave Coopérative" name="idDomaine" id="idDomaine_id" required/>
        </p>
        <input type='hidden' name='action' value='createdVin'>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset> 
</form>