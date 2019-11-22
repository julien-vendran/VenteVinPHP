<form method="post" action="">
    <fieldset>
        <legend> Créer un compte </legend>
        <p>
            <label for="nomUtilisateur_id">Nom Utilisateur</label> :
            <input type="text" placeholder="Ex : Dark Virgil 34" name="nomUtilisateur" id="nomUtilisateur_id" required/>
            <label for="loginUtilisateur_id">Login</label> :
            <input type="text" name="loginUtilisateur" id="loginUtilisateur_id" required/>
            <label for="mdpUtilisateur_id">Mot de passe</label> :
            <input type="password" name="mdpUtilisateur" id="mdpUtilisateur_id" required/>
        </p>
        <input type='hidden' name='action' value='createdUser'>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>