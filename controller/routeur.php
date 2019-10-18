<?php
    $path_array = array('controller','ControllerVoiture.php');
    $path = File::build_path($path_array);
    require_once ($path); // chargement du modèle

    // On recupère l'action passée dans l'URL
    if (!isset($_GET['action'])) {
        $action = 'readAll';
    } else {
        $action = $_GET['action'];
    }

    //On vérifie que l'action passé est une méthode correcte
     $methods = get_class_methods('ControllerVoiture');
    if (in_array($action, $methods)) {
        // Appel de la méthode statique $action de ControllerVoiture
        ControllerVoiture::$action(); 
    } else {
        //Appel de la page error car la méthode n'a pas été reconnue
        $controller = 'voiture';
        $view = 'error';
        $pagetitle = 'ERREUR';
        require File::build_path(array('view','view.php'));
    }


?>

