<?php
require_once File::build_path(array('controller','ControllerVin.php'));
require_once File::build_path(array('controller','ControllerDomaine.php'));
require_once File::build_path(array('controller','ControllerViticulteur.php'));
require_once File::build_path(array('controller', 'ControllerUtilisateur.php'));

    if (Session::est_connecte()) {
        $action = 'accueil';
        $controller = 'accueil';
        $view = 'accueilConnecte';
        $pagetitle = 'Bienvenue ! ';
    } else {
        $action = 'accueil';
        $controller = 'accueil';
        $view = 'accueilNonConnecte';
        $pagetitle = 'Bienvenue ! ';
    }

    if (!isset($_GET['action']) && !isset($_POST['action'])) {
        require File::build_path(array('view','view.php'));
    } else if (!isset($_POST['action'])){
        $action = $_GET['action'];
    } else {
        $action = $_POST['action'];
    }

    if (isset($_GET['controller'])){
        $controlle = $_GET['controller'];
    }
    else
        $controlle = 'vin';

    $calledController = 'Controller' . $controlle;
    echo "la : " . $calledController;

    $methods_Vin = get_class_methods('ControllerVin');
    $methods_Domaine = get_class_methods('ControllerDomaine');
    $methods_Viticulteur = get_class_methods('ControllerViticulteur');
    $methods_Utilisateur = get_class_methods('ControllerUtilisateur');
    if (in_array($action, $methods_Vin))
        ControllerVin::$action();
    else if (in_array($action, $methods_Domaine))
        ControllerDomaine::$action();
    else if (in_array($action, $methods_Viticulteur))
        ControllerViticulteur::$action();
    else if (in_array($action, $methods_Utilisateur))
        ControllerUtilisateur::$action();
    else if ($action =! "accueil") {
        $controller = 'vin';
        $view = 'error';
        $pagetitle = 'ERREUR';
        require File::build_path(array('view','view.php'));
    }