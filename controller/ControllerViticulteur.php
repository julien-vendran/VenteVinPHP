<?php

require_once File::build_path(array('model', 'ModelViticulteur.php'));

class ControllerViticulteur {
    public static function readAllViticulteurs() {
        $tab = ModelViticulteur::selectAll();
        $controller = 'viticulteur';
        $view = 'list';
        $pagetitle = 'Liste de Viticulteur';
        require File::build_path(array('view', 'view.php')); //redirige vers la vue
    }


    public static function adminPanelViticulteur () {
        $user = ModelViticulteur::select($_SESSION['login']);
        $id_viticulteur = $user->get('idViticulteur');
        $tab = ModelUtilisateur::selectAllVinByIdViticulteur($id_viticulteur);
        $controller = 'viticulteur';
        $view = 'panel';
        $pagetitle = 'Panneau d\'administration';
        require File::build_path(array('view', 'view.php'));
    }

        public static function createViticulteur () {
        $controller = 'viticulteur';
        $view = 'create';
        $pagetitle = 'Création d\'un agriculteur';
        require File::build_path(array('view', 'view.php'));
    }

    public static function createdViticulteur () {
        require_once File::build_path(array('model', 'ModelUtilisateur.php'));
        $valuesViticulteurs = array(
            "nomViticulteur" => $_POST['nomViticulteur'],
            "loginViticulteur" => $_POST['loginViticulteur']
        );
        $okViti = ModelViticulteur::insert($valuesViticulteurs);
        $valuesUtilisateurs = array(
            "loginUtilisateur" => $_POST['loginViticulteur'],
            "mdpUtilisateur" => Security::chiffrer($_POST['mdpViticulteur']),
            "nomUtilisateur" => $_POST['nomViticulteur'] . " " . $_POST['prenomViticulteur'],
            "nonce" => '',
            "emailUtilisateur" => ''
        );
        $okUti = ModelUtilisateur::insert($valuesUtilisateurs);

        if ($okViti && $okUti) {
            $controller = 'viticulteur';
            $view = 'created';
            $pagetitle = 'Ajouté';
        } else if ($okViti) {
            $controller = 'viticulteur';
            $view = 'erreurUser';
            $pagetitle = 'Erreur de création utilisateur';
        } else if ($okUti) {
            $controller = 'viticulteur';
            $view = 'erreurAjoutTotal';
            $pagetitle = 'Erreur de création utilisateur';
        } else {
            $controller = 'viticulteur';
            $view = 'erreurAjoutTotal';
            $pagetitle = 'Erreur de création utilisateur';
        }
        require File::build_path(array('view', 'view.php'));
    }
}