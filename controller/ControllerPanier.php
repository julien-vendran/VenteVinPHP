<?php

require_once File::build_path(array('model', 'ModelPanier.php'));

class ControllerPanier {
    public static function readPanier () {
        $controller = 'panier';
        $view = 'list';
        $pagetitle = 'Panier';
        require File::build_path(array('view', 'view.php'));
    }
}