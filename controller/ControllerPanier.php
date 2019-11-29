<?php

require_once File::build_path(array('model', 'ModelPanier.php'));

class ControllerPanier {
    public static function readPanier () {
        $controller = 'panier';
        $view = 'list';
        $pagetitle = 'Panier';
        require File::build_path(array('view', 'view.php'));
    }

    public static function ajouterVinPanier () {
        /*ajouterArticle($idVin, $nombreBouteille,$prixVin)*/
        $nomVin = $_POST['nomVin'];
        $qteVin = $_POST['qteVin'];
        $fait = ModelPanier::ajouterArticle($_POST['idVin'], $_POST['qteVin'], $_POST['prixVin']);

        $tab = ModelVin::selectAll();
        if ($fait) {
            unset($_POST);
            $controller = 'panier';
            $view = 'ajout';
            $pagetitle = 'Article ajouté ! ';
            require_once File::build_path(array('view', 'view.php'));
        } else {
            echo 'erreur';
        }
    }
}