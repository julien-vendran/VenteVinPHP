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
        $controller = 'utilisateur';
        $view = 'adminPanel';
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
            "idDomaine" => 1
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

    /* public static function createdVin() {
        $valuesVin = array(
            "idVin" => $_GET['idVin'],
            "nomVin" => $_GET['nomVin'],
            "anneeVin" => $_GET['anneeVin'],
            "descriptionVin" => $_GET['descriptionVin'],
            "typeVin" => $_GET['typeVin'],
            "medailleVin" => $_GET['medailleVin'],
            "prixVin" => $_GET['prixVin'],
            "idDomaine" => $_GET['idDomaine'],
        );
        $ok = ModelVin::insert($valuesVin);
        $tab = ModelVin::selectAll(); //On va s'en servir dans les vues pour appeler la liste après insertion
        if (!$ok) {
            $controller = 'vin';
            $view = 'error';
            $pagetitle = 'ERREUR';
        } else {
            $controller = 'vin';
            $view = 'created';
            $pagetitle = 'Vin Crée';
        }
        require File::build_path(array('view', 'view.php'));
    }

    public static function deletedVin() {
        $idVin = $_GET['idVin'];
        if (!is_null($idVin)) {
            $view = 'error';
            $controller = 'vin';
            $pagetitle = 'ERREUR';
        } else {
            ModelVin::delete($idVin);
            $tab = ModelVin::selectAll();
            $controller = 'vin';
            $view = 'deleted';
            $pagetitle = 'Vin Supprimée';
        }
        require File::build_path(array('view', 'view.php'));
    }

    public static function updateVin() {
        $v = ModelVin::select($_GET['idVin']);
        $controller = 'vin';
        $view = 'update';
        $pagetitle = 'Modification Vin';
        require File::build_path(array('view', 'view.php'));
    }

    public static function updatedVin(){
        $idVin = $_GET['idVin'];
        $values = array(
            "idVin" => $idVin,
            "nomVin" => $_GET['nomVin'],
            "anneeVin" => $_GET['anneeVin'],
            "descriptionVin" => $_GET['descriptionVin'],
            "typeVin" => $_GET['typeVin'],
            "medailleVin" => $_GET['medailleVin'],
            "prixVin" => $_GET['prixVin'],
            "idDomaine" => $_GET['idDomaine']
        );
        $ok = ModelVin::update($values, $idVin);
        $tab_v = ModelVin::selectAll();
        if (!$ok) {
            $controller = 'vin';
            $view = 'error';
            $pagetitle = 'ERREUR';
        } else {
            $controller = 'vin';
            $view = 'updated';
            $pagetitle = 'Vin Modifiée';
        }
        require File::build_path(array('view', 'view.php'));
    }
*/
}