<div class="container">
    <h1>Inscription</h1>

    <form method = "post">
        <fieldset>
            <legend>
                Inscription
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
                <input type = "hidden" name = "action" value = "inscritUser" />
            </p>
            <p>
                <button class="btn waves-effect waves-light" type="submit" name="action">
                    S'inscire
                </button>
            </p>
        </fieldset>
    </form>
</div>