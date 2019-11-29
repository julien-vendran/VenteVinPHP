<div class="container">
    <h1>Bienvenue sur caveau-online</h1>
    <h4>Merci de vous connecter</h4>

    <form method = "post">
        <fieldset>
            <legend>
                Connexion
            </legend>
            <p class = "p_column">
                <label for = "login_id">
                    Login
                </label>
                <input type = "text" name="login" id="login_id" required/>
            </p>
            <p class = "p_column">
                <label for = "mdp_id">
                    Mot de passe
                </label>
                <input type="password" name="mdp" id="mdp_id" required/>
            </p>
            <p>
                <input type = "hidden" name = "action" value = "connectedUser" />
            </p>
            <p>
                <button class="btn waves-effect waves-light" type="submit" name="action">Connexion
                </button>
            </p>
        </fieldset>
    </form>
</div>
