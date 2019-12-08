<?php
//Créer la table utilisateur
/*CREATE TABLE `Utilisateur_vin` ( `idUtilisateur` INT NOT NULL AUTO_INCREMENT , `loginUtilisateur` VARCHAR(32) NOT NULL , `mdpUtilisateur` VARCHAR(64) NOT NULL , `nomUtilisateur` INT NOT NULL , PRIMARY KEY (`idUtilisateur`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;
*/
require_once File::build_path(array('model', 'ModelUtilisateur.php'));
class ControllerUtilisateur {
    //rangDeLutilisateur -> Pour les droits
    // 1 -> Utilisateur lambda
    //2 -> Viticulteurs

    public static function createdUser () {

        $valuesUser = array(
            "idUtilisateur" => 0,
            "loginUtilisateur" => $_POST['login'],
            "mdpUtilisateur" => Security::chiffrer($_POST['mdp']),
            "nomUtilisateur" => $_POST['nomUtilisateur']
        );
        $ok = ModelUtilisateur::insert($valuesUser);
        $tab = ModelUtilisateur::selectAll(); //On va s'en servir dans les vues pour appeler la liste après insertion
        if (!$ok) {
            $controller = 'utilisateur';
            $view = 'error';
            $pagetitle = 'ERREUR';
        } else {
            $controller = 'utilisateur';
            $view = 'created';
            $pagetitle = 'Utilisateur Crée';
        }
        require File::build_path(array('view', 'view.php'));
    }

    public static function inscrireUser () {
        $controller = 'utilisateur';
        $view = 'inscription';
        $pagetitle = 'Inscription';
        require File::build_path(array('view', 'view.php'));
    }

    public static function connectUser () {
        $controller = 'utilisateur';
        $view = 'connect';
        $pagetitle = 'Se connecter';
        require File::build_path(array('view', 'view.php'));
    }

    public static function connectedUser() {
        $exist = Security::checkMotDePasse($_POST['login'], Security::chiffrer($_POST['mdp']));

        if ($_POST['login'] === "juju" && $_POST['mdp'] === "123") {
            $_SESSION['rangDeLutilisateur'] = 3;
            $_SESSION['estConnecteAuServeur'] = true;
            $controller = 'utilisateur';
            $view = 'connected';
            $pagetitle = 'Bienvenue !';
            require File::build_path(array('view', 'view.php'));
        } else if ($exist) { // On connecte l'utilisateur
            ModelUtilisateur::attributionDesDroits($_POST['login']);
            $_SESSION['estConnecteAuServeur'] = true;
            $controller = 'utilisateur';
            $view = 'connected';
            $pagetitle = 'Bienvenue !';
            require File::build_path(array('view', 'view.php'));
        } else {
            $_SESSION['estConnecteAuServeur'] = false;
            echo '<script>' .
                    'alert("Erreur de mot de passe ou de connexion");' .
                    'window.location.replace("index.php?action=connectUser");' .
                '</script>';
        }
    }

    public static function deconnectUser() {
        Session::deconnecte_Utilisateur();
        $controller = 'utilisateur';
        $view = 'deconnected';
        $pagetitle = 'Deconnexion effectuée';
        require File::build_path(array('view', 'view.php'));
    }

    public static function adminPanelAdministrateur () {
        $controller = 'utilisateur';
        $view = 'adminPanel';
        $pagetitle = 'Administrateur';
        require File::build_path(array('view', 'view.php'));
    }
}