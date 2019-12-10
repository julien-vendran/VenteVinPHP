<?php
require_once File::build_path(array('controller','ControllerVin.php'));
require_once File::build_path(array('controller','ControllerViticulteur.php'));
require_once File::build_path(array('controller', 'ControllerUtilisateur.php'));
require_once File::build_path(array('controller', 'ControllerPanier.php'));
require_once File::build_path(array('lib', 'Session.php'));

    if (Session::est_connecte()) {
        $action = 'accueil';
        $controller = 'accueil';
        $view = 'accueil';
        $pagetitle = "Accueil";
    } else {
        if ( isset ($_COOKIE['estMajeur']) && $_COOKIE['estMajeur'] == true) {
            $action = 'accueil';
            $controller = 'utilisateur';
            $view = 'connect';
            $pagetitle = 'On s\'est déjà vu non ? ';
        } else {
            $notVisiteYet = true;
            $action = 'accueil';
            $controller = 'accueil';
            $view = 'nonConnecte';
            $pagetitle = 'Etes-vous majeur ? ';
        }
    }


    if (!isset($_GET['action']) && !isset($_POST['action'])) {
        //require File::build_path(array('view','view.php'));
        $action = "accueil";
        require_once File::build_path(array('view', 'view.php'));
    } else if (!isset($_POST['action'])){
        $action = $_GET['action'];
    } else {
        $action = $_POST['action'];
    }


    $methods_Vin = get_class_methods('ControllerVin');
    $methods_Viticulteur = get_class_methods('ControllerViticulteur');
    $methods_Utilisateur = get_class_methods('ControllerUtilisateur');
    $methods_panier = get_class_methods('ControllerPanier');

    if (in_array($action, $methods_Vin))
        ControllerVin::$action();
    else if (in_array($action, $methods_Viticulteur))
        ControllerViticulteur::$action();
    else if (in_array($action, $methods_Utilisateur))
        ControllerUtilisateur::$action();
    else if (in_array($action, $methods_panier))
        ControllerPanier::$action();
    else if ($action =! "accueil") {
        $controller = 'vin';
        $view = 'error';
        $pagetitle = 'ERREUR';
        require File::build_path(array('view','view.php'));
    }
    /*else {
        $controller = 'accueil';
        $view = 'accueil';
        $pagetitle = "Accueil";
        require File::build_path(array('view','view.php'));
    }*/