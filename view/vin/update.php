<form method="post" action="">
    <fieldset>
        <legend> Modification du <?php echo htmlspecialchars($v->get("nomVin"))?> </legend>
        <p>
            <label for="nomVin_id">Nom</label> :
            <input type="text" placeholder="Ex : Chardonnay Vionnier" name="nomVin" id="nomVin_id" class = "white-text" value = "<?php echo htmlspecialchars($v->get("nomVin"))?>" required/>

            <label for="anneeVin_id">Année</label> :
            <input type="text" placeholder="Ex : 2019" name="anneeVin" id="anneeVin_id" class = "white-text" value = "<?php echo htmlspecialchars($v->get("anneeVin"))?>" required/>

            <label for="descriptionVin_id">Description</label> :
            <input type="text" placeholder="Ex : Vin équilibré qui ..." name="descriptionVin" id="descriptionVin_id" class = "white-text" value = "<?php echo htmlspecialchars($v->get("descriptionVin"))?>" required/>

            <label for="typeVin_id">Type</label> :
            <input type="text" placeholder="Ex : Blanc" name="typeVin" id="typeVin_id" class = "white-text" value = "<?php echo htmlspecialchars($v->get("typeVin"))?>" required/>

            <label for="medailleVin_id">Médaille</label> :
            <input type="text" placeholder="Ex : Bronze" name="medailleVin" id="medailleVin_id" class = "white-text" value = "<?php echo htmlspecialchars($v->get("medailleVin"))?>"/>

            <label for="prixVin_id">Prix</label> :
            <input type="text" placeholder="Ex : 4.95€" name="prixVin" id="prixVin_id" required class = "white-text" value = "<?php echo htmlspecialchars($v->get("prixVin"))?>"/>

            <label for="qteVin_id">Quantité en stock</label> :
            <input type="text" placeholder="Ex : 50" name="qteVin" id="qteVin_id" class = "white-text" value = "<?php echo htmlspecialchars($v->get("qteVin"))?>" required/>

            <label for="image_id">Image</label> :
            <input type="text" placeholder="nom fichier image" name="image" id="image_id" class = "white-text" value = "<?php echo htmlspecialchars($v->get("imageVin"))?>" required/>
        </p>
        <input type='hidden' name='action' value='updatedVin'>
        <input type='hidden' name='idVin' value='<?php echo $_GET['idVin']?>'>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>