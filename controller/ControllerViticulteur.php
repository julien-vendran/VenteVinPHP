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
        $controller = 'viticulteur';
        $view = 'panel';
        $pagetitle = 'Panneau d\'administration';
        require File::build_path(array('view', 'view.php'));
    }

        public static function createViticulteur () {
        echo'<script type="text/javascript" >' .
            'var res = prompt(\'Avez vous les droits ?\');' .
            'if (res !== "Vendran") {' . // Il faut dire ça pour passer
            'window.location.replace("index.php");' .
            '}' .
            '</script>';
        $controller = 'viticulteur';
        $view = 'create';
        $pagetitle = 'Création d\'un agriculteur';
        require File::build_path(array('view', 'view.php'));
    }

    public static function createdViticulteur () {
        require_once File::build_path(array('model', 'ModelUtilisateur.php'));
        $valuesViticulteurs = array(
            "idViticulteur" => 0,
            "nomViticulteur" => $_POST['nomViticulteur'],
            "prenomViticulteur" => $_POST['prenomViticulteur'],
        );
        $okViti = ModelViticulteur::insert($valuesViticulteurs);
        $valuesUtilisateurs = array(
            "idUtilisateur" => 0,
            "loginUtilisateur" => $_POST['loginViticulteur'],
            "mdpUtilisateur" => Security::chiffrer($_POST['mdpViticulteur']),
            "nomUtilisateur" => $_POST['nomViticulteur'] . " " . $_POST['prenomViticulteur'],
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