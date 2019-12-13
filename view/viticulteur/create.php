<form method="post">
    <fieldset>
        <legend> Création </legend>
        <p>
            <label for="prenomViticulteur_id">Prénom</label> :
            <input type="text" placeholder="Ex : Eric" name="prenomViticulteur" id="prenomViticulteur_id" required/>

            <label for="nomViticulteur_id">Nom</label> :
            <input type="text" placeholder="Ex : Vendran" name="nomViticulteur" id="nomViticulteur_id" required/>

            <label for="loginViticulteur_id">Login</label> :
            <input type="text" placeholder="Ex : vendrane" name="loginViticulteur" id="loginViticulteur_id" required/>

            <label for="mdpViticulteur_id">Mot de passe </label> :
            <input type="password" name="mdpViticulteur" id="mdpViticulteur_id" required/>
        </p>
        <input type='hidden' name='action' value='createdViticulteur'>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>