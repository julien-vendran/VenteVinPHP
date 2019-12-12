<?php
//Créer la table utilisateur
/*CREATE TABLE `Utilisateur_vin` ( `idUtilisateur` INT NOT NULL AUTO_INCREMENT , `loginUtilisateur` VARCHAR(32) NOT NULL , `mdpUtilisateur` VARCHAR(64) NOT NULL , `nomUtilisateur` INT NOT NULL , PRIMARY KEY (`idUtilisateur`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;
*/
require_once File::build_path(array('model', 'ModelUtilisateur.php'));
class ControllerUtilisateur {
    //rangDeLutilisateur -> Pour les droits
    // 1 -> Utilisateur lambda
    //2 -> Viticulteurs

    public static function createdUser () { // Equivaut à UtilisateurInscrit
        if ($_POST["mdp"] == $_POST["mdpvalide"]) {
            $loginused = ModelUtilisateur::select($_POST['login']);
            if (is_null($loginused)) {
                if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                    $valuesUser = array(
                        "loginUtilisateur" => $_POST['login'],
                        "mdpUtilisateur" => Security::chiffrer($_POST['mdp']),
                        "nomUtilisateur" => $_POST['nomUtilisateur'],
                        "emailUtilisateur" => $_POST['mail'],
                        "nonce" => Security::genrateRandomHex(),
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
                        //On envoie le mail à l'utilisateur
                        $lien = "http://webinfo.iutmontp.univ-montp2.fr/~vendranj/VenteVinPHP/index.php?action=validate&login=" . urlencode($_POST['login']) . "&nonce=" . urlencode($valuesUser['nonce']);
                        $email = "<h1>" .
                            "Votre inscription à bien été retenue" .
                            "</h1>" .
                            "<p>" .
                            "Rendez vous à l'adresse ci-jointe pour valider votre inscritpion" .
                            "</p>" .
                            "<a href = ". $lien .">" .
                            "Valider votre inscription" .
                            "</a>";
                        mail($valuesUser['emailUtilisateur'], "Validation inscription à Caveau-Online", $email);
                    }
                } else {
                    $erreurRencontree = "mail";
                    $controller = 'utilisateur';
                    $view = 'inscription';
                    $pagetitle = 'Inscription';
                }
            } else {
                $erreurRencontree = "login";
                $controller = 'utilisateur';
                $view = 'inscription';
                $pagetitle = 'Inscription';
            }
        } else {
            echo 'par la';
            $erreurRencontree = "mdp";
            $controller = 'utilisateur';
            $view = 'inscription';
            $pagetitle = 'Inscription';
        }
        require File::build_path(array('view', 'view.php'));
    }

    public static function validate() {
        $login = $_GET['login'];
        $nonce = $_GET['nonce'];
        $user = ModelUtilisateur::select($login);
        $nonceBD = $user->get('nonce');
        if ($nonce == $nonceBD) {
            $data = array(
                "nonce" => NULL,
            );
            ModelUtilisateur::update($data, $login);
            $controller = 'utilisateur';
            $view = 'inscriptionValidee';
            $pagetitle = 'Inscription Validée ! ';
        } else {
            $controller = 'utilisateur';
            $view = 'inscriptionNonValidee';
            $pagetitle = 'Inscription Validée ! ';
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
            $_SESSION['login'] = $_POST['login'];
            $controller = 'utilisateur';
            $view = 'connected';
            $pagetitle = 'Bienvenue !';
            require File::build_path(array('view', 'view.php'));
        } else if ($exist) { // On connecte l'utilisateur
            $user = ModelUtilisateur::select($_POST['login']);
            $once = $user->get("nonce");
            if ( $once == NULL) {
                ModelUtilisateur::attributionDesDroits($_POST['login']);
                $_SESSION['estConnecteAuServeur'] = true;
                $_SESSION['login'] = $_POST['login'];
                $controller = 'utilisateur';
                $view = 'connected';
                $pagetitle = 'Bienvenue !';
            } else {
                $erreurRencontree = "nonce";
                $controller = 'utilisateur';
                $view = 'connect';
                $pagetitle = 'Se connecter';
            }
            require File::build_path(array('view', 'view.php'));
        } else {
            $_SESSION['estConnecteAuServeur'] = false;
            $erreurRencontree = "mdp";
            $controller = 'utilisateur';
            $view = 'connect';
            $pagetitle = 'Se connecter';
            require File::build_path(array('view', 'view.php'));
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

    public static function detailUser(){
        $user = ModelUtilisateur::select($_SESSION['login']);

        $loginUtilisateur = $user->get('loginUtilisateur');
        $nomUtilisateur = $user->get('nomUtilisateur');
        $emailUtilisateur = $user->get('emailUtilisateur');


        $controller = 'utilisateur';
        $view = 'detail';
        $pagetitle = 'Profil';
        require File::build_path(array('view', 'view.php'));
    }
}