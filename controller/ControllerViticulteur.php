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
        //require File::build_path(array('view', 'view.php')); -> Pour le moment il manque la vue create
    }

    /*public static function readVin() {
        $v = ModelVin::select($_GET['idVin']);
        $controller = 'vin';
        if (empty($v)) {
            $view = 'error';
            $pagetitle = 'ERREUR';
        } else {
            $view = 'detail';
            $pagetitle = 'Détail Vin';
        }
        require File::build_path(array('view', 'view.php'));
    }

    public static function createVin() {
        $controller = 'vin';
        $view = 'create';
        $pagetitle = 'Création Vin';
        require File::build_path(array('view', 'view.php'));
    }

    public static function createdVin() {
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