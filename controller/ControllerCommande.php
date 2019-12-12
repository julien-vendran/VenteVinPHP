<?php
require_once File::build_path(array('model', 'ModelCommande.php'));

class ControllerCommande{

    public static function create(){

        ModelCommande::enregistrerCommande($_SESSION['login'], $_SESSION['panierVin']);
        $controller = 'commande';
        $view = 'created';
        $pagetitle = 'Commande créé';
        require File::build_path(array('view', 'view.php'));
    }
}