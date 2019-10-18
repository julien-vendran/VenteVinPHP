<?php

$path_array = array('model', 'ModelVin.php');
$path = File::build_path($path_array);
require_once ($path); // chargement du modèle

class ControllerVin {

    public static function readAll() {
        $tab_v = ModelVin::getAllVins(); //appel au modèle pour gerer la BD
        $controller = 'Vin';
        $view = 'list';
        $pagetitle = 'Liste de Vins';
        require File::build_path(array('view', 'view.php')); //redirige vers la vue
    }

    public static function read() {
        $v = ModelVin::getVinByImmat($_GET['immat']);
        $controller = 'Vin';
        if (empty($v)) {
            $view = 'error';
            $pagetitle = 'ERREUR';
            require File::build_path(array('view', 'view.php'));
        } else {
            $view = 'detail';
            $pagetitle = 'Détail Vin';
            require File::build_path(array('view', 'view.php'));
        }
    }

    public static function create() {
        $controller = 'Vin';
        $view = 'create';
        $pagetitle = 'Création Vin';
        require File::build_path(array('view', 'view.php'));
    }

    public static function created() {
        $immat = $_GET['immatriculation'];
        $marque = $_GET['marque'];
        $couleur = $_GET['couleur'];
        $Vin = new ModelVin($marque, $couleur, $immat);
        $ok = $Vin->save();
        $controller = 'Vin';
        $tab_v = ModelVin::getAllVins(); //appel au modèle pour gerer la BD
        if (!$ok) {
            $view = 'error';
            $pagetitle = 'ERREUR';
            require File::build_path(array('view', 'view.php'));
        } else {
            $view = 'created';
            $pagetitle = 'Vin Crée';
            require File::build_path(array('view', 'view.php'));
        }
    }

    public static function deleted() {
        $immat = $_GET['immat'];
        $v = ModelVin::getVinByImmat($_GET['immat']);
        $ok = $v->delete();
        $tab_v = ModelVin::getAllVins(); //appel au modèle pour gerer la BD
        $controller = 'Vin';
        if (!$ok) {
            $view = 'error';
            $pagetitle = 'ERREUR';
            require File::build_path(array('view', 'view.php'));
        } else {
            $view = 'deleted';
            $pagetitle = 'Vin Supprimée';
            require File::build_path(array('view', 'view.php'));
        }
    }

    public static function update() {
        $v = ModelVin::getVinByImmat($_GET['immat']);
        $controller = 'Vin';
        $view = 'update';
        $pagetitle = 'Modification Vin';
        require File::build_path(array('view', 'view.php'));
    }
    
    public static function updated(){
        $values = array($_GET['immat'], $_GET['marque'], $_GET['couleur']);
        $ok = ModelVin::update($values);
        $controller = 'Vin';
        $tab_v = ModelVin::getAllVins(); //appel au modèle pour gerer la BD
        if (!$ok) {
            $view = 'error';
            $pagetitle = 'ERREUR';
            require File::build_path(array('view', 'view.php'));
        } else {
            $view = 'updated';
            $pagetitle = 'Vin Modifiée';
            require File::build_path(array('view', 'view.php'));
        }
    }

}

?>
