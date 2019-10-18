<?php

$path_array = array('model', 'ModelVoiture.php');
$path = File::build_path($path_array);
require_once ($path); // chargement du modèle

class ControllerVoiture {

    public static function readAll() {
        $tab_v = ModelVoiture::getAllVoitures(); //appel au modèle pour gerer la BD
        $controller = 'voiture';
        $view = 'list';
        $pagetitle = 'Liste de Voitures';
        require File::build_path(array('view', 'view.php')); //redirige vers la vue
    }

    public static function read() {
        $v = ModelVoiture::getVoitureByImmat($_GET['immat']);
        $controller = 'voiture';
        if (empty($v)) {
            $view = 'error';
            $pagetitle = 'ERREUR';
            require File::build_path(array('view', 'view.php'));
        } else {
            $view = 'detail';
            $pagetitle = 'Détail Voiture';
            require File::build_path(array('view', 'view.php'));
        }
    }

    public static function create() {
        $controller = 'voiture';
        $view = 'create';
        $pagetitle = 'Création Voiture';
        require File::build_path(array('view', 'view.php'));
    }

    public static function created() {
        $immat = $_GET['immatriculation'];
        $marque = $_GET['marque'];
        $couleur = $_GET['couleur'];
        $voiture = new ModelVoiture($marque, $couleur, $immat);
        $ok = $voiture->save();
        $controller = 'voiture';
        $tab_v = ModelVoiture::getAllVoitures(); //appel au modèle pour gerer la BD
        if (!$ok) {
            $view = 'error';
            $pagetitle = 'ERREUR';
            require File::build_path(array('view', 'view.php'));
        } else {
            $view = 'created';
            $pagetitle = 'Voiture Crée';
            require File::build_path(array('view', 'view.php'));
        }
    }

    public static function deleted() {
        $immat = $_GET['immat'];
        $v = ModelVoiture::getVoitureByImmat($_GET['immat']);
        $ok = $v->delete();
        $tab_v = ModelVoiture::getAllVoitures(); //appel au modèle pour gerer la BD
        $controller = 'voiture';
        if (!$ok) {
            $view = 'error';
            $pagetitle = 'ERREUR';
            require File::build_path(array('view', 'view.php'));
        } else {
            $view = 'deleted';
            $pagetitle = 'Voiture Supprimée';
            require File::build_path(array('view', 'view.php'));
        }
    }

    public static function update() {
        $v = ModelVoiture::getVoitureByImmat($_GET['immat']);
        $controller = 'voiture';
        $view = 'update';
        $pagetitle = 'Modification Voiture';
        require File::build_path(array('view', 'view.php'));
    }
    
    public static function updated(){
        $values = array($_GET['immat'], $_GET['marque'], $_GET['couleur']);
        $ok = ModelVoiture::update($values);
        $controller = 'voiture';
        $tab_v = ModelVoiture::getAllVoitures(); //appel au modèle pour gerer la BD
        if (!$ok) {
            $view = 'error';
            $pagetitle = 'ERREUR';
            require File::build_path(array('view', 'view.php'));
        } else {
            $view = 'updated';
            $pagetitle = 'Voiture Modifiée';
            require File::build_path(array('view', 'view.php'));
        }
    }

}

?>
