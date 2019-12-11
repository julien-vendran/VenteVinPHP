<?php

require_once File::build_path(array('model', 'ModelVin.php')); // chargement du modèle

class ControllerVin {

    public static function readAllVins() {
        $tab = ModelVin::selectAll();
        $controller = 'vin';
        $view = 'list';
        $pagetitle = 'Liste de Vins';
        require File::build_path(array('view', 'view.php')); //redirige vers la vue
    }

    public static function readVin() {
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
            "nomVin" => $_GET['nomVin'],
            "anneeVin" => $_GET['anneeVin'],
            "descriptionVin" => $_GET['descriptionVin'],
            "typeVin" => $_GET['typeVin'],
            "medailleVin" => $_GET['medailleVin'],
            "prixVin" => $_GET['prixVin'],
            "qteVin" => $_GET['qteVin'],
            "imageVin" => "./view/images/" . $_GET['image'],
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
            "nomVin" => $_GET['nomVin'],
            "anneeVin" => $_GET['anneeVin'],
            "descriptionVin" => $_GET['descriptionVin'],
            "typeVin" => $_GET['typeVin'],
            "medailleVin" => $_GET['medailleVin'],
            "prixVin" => $_GET['prixVin'],
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

}
