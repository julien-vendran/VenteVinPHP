<?php
echo '<h1>Bienvenue sur notre site d\'évaluation de requête SQL</h1>';
echo '<h4>Je vais vous laisser vous connecter pour me permettre de vous reconnaitre !</h4>';

//On va créer un formulaire pour se connecter

echo '<form method = "post">' .
    '<fieldset>' .
    '<legend>' .
    'Connexion' .
    '</legend>' .
    '<p class = "p_column">' .
    '<label for = "login_id">' .
    ' Login ' .
    '</label>' .
    '<input type = "text" name="login" id="login_id" required/>' .
    '</textarea>' .
    '</p>' .
    '<p class = "p_column">' .
    '<label for = "mdp_id">' .
    ' Mot de passe ' .
    '</label>' .
    '<input type="password" name="mdp" id="mdp_id" required/>' .
    '</textarea>' .
    '</p>' .
    '<p>' .
    '<input type = "hidden" name = "action" value = "connectedUser" />' .
    '</p>' .
    '<p>' .
    '<input type = "submit" value = "Connexion" />' .
    '</p>' .
    '</fieldset>' .
    '</form>';