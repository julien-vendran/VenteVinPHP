<?php
require_once File::build_path(array('controller','ControllerVin.php'));
require_once File::build_path(array('controller','ControllerDomaine.php'));
require_once File::build_path(array('controller','ControllerViticulteur.php'));

    // On recupère l'action passée dans l'URL
    if (!isset($_GET['action'])) {
        $action = 'readAll';
    } else {
        $action = $_GET['action'];
    }

    if (isset($_GET['controller'])){
        $controlle = $_GET['controller'];
    }
    else
        $controlle = 'vin';

    $calledController = 'Controller' . $controlle;
    $methods = get_class_methods($calledController);
    if (in_array($action, $methods))
        $calledController::$action();
    else {
        $controller = 'vin';
        $view = 'error';
        $pagetitle = 'ERREUR';
        require File::build_path(array('view','view.php'));
    }