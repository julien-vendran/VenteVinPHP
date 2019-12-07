<?php
    if ( ! isset($_COOKIE['estMajeur']))
        setcookie("estMajeur", true, time() + (86400 * 15)); //86400 = 1 jour
?>

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
                <input class = "white-text" type = "text" name="login" id="login_id" required/>
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
                <button class="btn waves-effect waves-light" type="submit">
                    Connexion
                </button>
            </p>
        </fieldset>
    </form>
    <p>
        Pas encore inscrit ?
        <a href="?action=inscrireUser">
            <button class="btn waves-effect waves-light">
                Inscription
            </button>
        </a>
    </p>
</div>
