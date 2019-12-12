<?php
    if (isset($_POST['login']))
        $login = $_POST['login'];
    else
        $login ="";
    if (isset($_POST['mail']))
        $email = $_POST['mail'];
    else
        $email = "";
    if (isset($_POST['nomUtilisateur']))
        $nom = $_POST['nomUtilisateur'];
    else
        $nom = "";
?>

<div class="container">
    <h1>Inscription</h1>

    <?php
        if (isset($erreurRencontree) && $erreurRencontree == "mdp") {
    ?>
        <div>
            <p>Vous avez entré des mots de passe différents</p>
        </div>
    <?php } else if (isset($erreurRencontree) && $erreurRencontree == "mail") { ?>
            <div>
                <p>Votre adresse mail n'a pas un format valide</p>
            </div>
    <?php } else if (isset($erreurRencontree) && $erreurRencontree == "login") {  ?>
    <div>
        <p>Le login que vous avez choisi est déjà utilisé</p>
    </div>
    <?php } ?>

    <form method = "post" action = "?action=createdUser">
        <fieldset>
            <legend>
                Inscription
            </legend>
            <p class = "p_column">
                <label for="nomUtilisateur_id">Nom Utilisateur</label> :
                <input type="text" name="nomUtilisateur" id="nomUtilisateur_id" value="<?php echo $nom?>" required/>
            </p>
            <p class = "p_column">
                <label for = "mail_id">
                    Adresse mail
                </label>
                <input type="email" name="mail" id="mail_id" value="<?php echo $email?>" required/>
            </p>
            <p class = "p_column">
                <label for = "login_id">
                    Login
                </label>
                <input type = "text" name="login" id="login_id" value="<?php echo $login?>" required/>
            </p>
            <p class = "p_column">
                <label for = "mdp_id">
                    Mot de passe
                </label>
                <input type="password" name="mdp" id="mdp_id" required/>
            </p>
            <p class = "p_column">
                <label for = "mdpvalide_id">
                    Valider votre mot de passe
                </label>
                <input type="password" name="mdpvalide" id="mdpvalide_id" required/>
            </p>

            <p>
                <button class="btn waves-effect waves-light" type="submit">
                    S'inscire
                </button>
            </p>
        </fieldset>
    </form>
</div>