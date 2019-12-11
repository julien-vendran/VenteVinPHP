<?php
if (isset($_POST['nomVin']))
    $nomVin = $_POST['nomVin'];
else
    $nomVin = "";
if (isset($_POST['anneeVin']))
    $anneeVin = $_POST['anneeVin'];
else
    $anneeVin = "";
if (isset($_POST['descriptionVin']))
    $descriptionVin = $_POST['descriptionVin'];
else
    $descriptionVin = "";
if (isset($_POST['typeVin']))
    $typeVin = $_POST['typeVin'];
else
    $typeVin = "";
if (isset($_POST['medailleVin']))
    $medailleVin = $_POST['medailleVin'];
else
    $medailleVin = "";
if (isset($_POST['prixVin']))
    $prixVin = $_POST['prixVin'];
else
    $prixVin = "";
if (isset($_POST['qteVin']))
    $qteVin = $_POST['qteVin'];
else
    $qteVin = "";
if (isset($_POST['image']))
    $imageVin = "./view/images/" . $_POST['image'];
else
    $imageVin = "";
?>

<form method="post" action="">
    <fieldset>
        <legend> Création </legend>
        <p>
            <label for="nomVin_id">Nom</label> :
            <input type="text" placeholder="Ex : Chardonnay Vionnier" name="nomVin" id="nomVin_id" value = "<?php echo $nomVin?>" required/>

            <label for="anneeVin_id">Année</label> :
            <input type="text" placeholder="Ex : 2019" name="anneeVin" id="anneeVin_id"value = "<?php echo $anneeVin?>" required/>

            <label for="descriptionVin_id">Description</label> :
            <input type="text" placeholder="Ex : Vin équilibré qui ..." name="descriptionVin" id="descriptionVin_id" value = "<?php echo $descriptionVin?>" required/>

            <label for="typeVin_id">Type</label> :
            <input type="text" placeholder="Ex : Blanc" name="typeVin" id="typeVin_id" value = "<?php echo $typeVin?>" required/>

            <label for="medailleVin_id">Médaille</label> :
            <input type="text" placeholder="Ex : Bronze" name="medailleVin" id="medailleVin_id" value = "<?php echo $medailleVin?>"/>

            <label for="prixVin_id">Prix</label> :
            <input type="text" placeholder="Ex : 4.95€" name="prixVin" id="prixVin_id" required value = "<?php echo $prixVin?>"/>

            <label for="qteVin_id">Quantité en stock</label> :
            <input type="text" placeholder="Ex : 50" name="qteVin" id="qteVin_id" value = "<?php echo $qteVin?>" required/>

            <label for="image_id">Image</label> :
            <input type="text" placeholder="nom fichier image" name="image" id="image_id" value = "<?php echo $imageVin?>" required/>
        </p>
        <input type='hidden' name='action' value='createdVin'>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset> 
</form>