<?php
require_once File::build_path(array('model', 'ModelVoiture.php'));
class ControllerVoiture {
    public static function readAll() {
        $tab_v = ModelVoiture::getAllVoitures(); //appel au modèle pour gerer la BD
        require_once File::build_path(array('view', 'voiture', 'list.php'));
    }

    public static function read() {
    	$immat = $_GET['immat'];
    	$v = ModelVoiture::getVoitureByImmat($immat);
    	if ($v == null) {
            require_once File::build_path(array('view', 'voiture', 'error.php'));
    	}
    	else {
            require_once File::build_path(array('view', 'voiture', 'detail.php'));
    	}
    }

    public static function create() {
        require_once File::build_path(array('view', 'voiture', 'create.php'));
    }

    public static function created() {
            require_once File::build_path(array('model', 'ModelVoiture.php'));
	    
        	$voit = new ModelVoiture($_POST['marque'], $_POST['couleur'], $_POST['immatriculation']);    
	        $existe = $voit->save();
        
        if ($existe === false) {
            require_once File::build_path(array('view', 'voiture', 'errorCP.php'));
        }
        else {
	    	echo "<p>Voiture créez</p>";
	        echo "<p>Voiture sauvegardée </p>";
	        ControllerVoiture::readAll();
        }
    }

    public static function supprVoiture() {
        File::build_path(array('view', 'voiture', 'supprVoiture.php'));
    }

    public static function supprimerVoiture() {
        require_once File::build_path(array('model', 'ModelVoiture.php'));
        echo "<p>Cette voiture : ". htmlspecialchars($_POST['immatriculation']) ."</p>";
        $supprime = ModelVoiture::delete($_POST['immatriculation']);

        if ($supprime === false) {
            echo "<p>Cette voiture n'a pas été supprimée</p>";
        }
        else {
            echo "<p>Cette voiture a été supprimée</p>";    
        }
    } 

    public static function supprimerVoitureGET() {
        require_once File::build_path(array('model', 'ModelVoiture.php'));
        echo "<p>Cette voiture : ". htmlspecialchars($_GET['immat']) ."</p>";
        $supprime = ModelVoiture::delete($_GET['immat']);

        if ($supprime === false) {
            echo "<p>Cette voiture n'a pas été supprimée</p>";
        }
        else {
            echo "<p>Cette voiture a été supprimée</p>";    
        }
    } 
}
?>