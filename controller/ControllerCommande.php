<?php
require_once File::build_path(array('model', 'ModelCommande.php'));

class ControllerCommande{
    public static function createCommande(){
        $values = array(
            'loginUtilisateur' => $_SESSION['login'],
            'montantCommande' => ModelPanier::MontantGlobal(),
        );

        ModelCommande::insert($values);
        $numCommande = ModelCommande::selectMax();

        $nbVin = count($_SESSION['panierVin']['idVin']);

        for($i=0; i<$nbVin; $i++){
            $values = array(
                'idCommande' => $numCommande,
                'idVin' => $_SESSION['panierVin']['idVin'][i],
                'quantite' => $_SESSION['nombreBouteille']['idVin'][i]
            );

            ModelLigneCommande::insert($values);
        }


        $controller = 'commande';
        $view = 'created';
        $pagetitle = 'Commande créé';
        require File::build_path(array('view', 'view.php'));
    }
}