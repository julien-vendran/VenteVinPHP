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

    public static function readAllCommande () {
        $tab_commande = ModelCommande::selectAllCommandeByUtilisateur();
        $controller = 'commande';
        $view = "list";
        $pagetitle = 'Toutes les commandes';
        require File::build_path(array('view', 'view.php'));
    }

    public static function detailCommande(){
        $tab_ligneCommande = ModelCommande::selectLigneCommandeByCommande($_GET['numCommande']);
        $count = 0;
        foreach ($tab_ligneCommande as $ligneCommande){
            $vin = ModelVin::select($ligneCommande['idVin']);
            $tab_ligneCommande[$count]['prixU'] = $vin->get('prixVin');
            $tab_ligneCommande[$count]['nomVin'] = $vin->get('nomVin');
            unset($tab_ligneCommande[$count++]['idVin']);
        }
        $controller = 'commande';
        $view = "detail";
        $pagetitle = 'Commande N°' . $_GET['numCommande'];
        require File::build_path(array('view', 'view.php'));
    }
}