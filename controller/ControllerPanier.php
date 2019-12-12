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

    public static function supprimerVinPanier () {
        $id = $_GET['idVin'];
        $v = ModelVin::select($id);
        if( ! is_null($v) && $v)
            $nomVin = $v->get('nomVin');

        $fait = ModelPanier::supprimerArticle($id);

        $tab = ModelVin::selectAll();

        if ($fait) {
            unset($_GET);
            $controller = 'panier';
            $view = 'supprime';
            $pagetitle = 'Article supprimé ! ';
            require_once File::build_path(array('view', 'view.php'));
        } else {
            echo 'erreur de suppression';
        }
    }

    public static function paye(){
        $controller = 'panier';
        $view = 'paiement';
        $pagetitle = 'Paiement';
        require_once File::build_path(array('view', 'view.php'));
    }
}