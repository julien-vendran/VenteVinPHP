<?php

require_once File::build_path(array('model', 'Model.php'));
class ModelPanier {
    public static function creationpanierVin(){
        if (!isset($_SESSION['panierVin'])){
            $_SESSION['panierVin']=array();
            $_SESSION['panierVin']['idVin'] = array();
            $_SESSION['panierVin']['nombreBouteille'] = array();
            $_SESSION['panierVin']['prixVin'] = array();
            $_SESSION['panierVin']['verrou'] = false; // Permet de ne plus pouvoir modifier le panierVin (Lors du paiement pas exemple)
        }
        return true;
    }

    private static function estVerrouille() {
        return (isset($_SESSION['panierVin']['verrou']) && $_SESSION['panierVin']['verrou']);
    }

    public static function ajouterArticle($idVin, $nombreBouteille,$prixVin){

        //Si le panierVin existe
        if (ModelPanier::creationpanierVin() && !ModelPanier::estVerrouille()) {
            //Si le produit existe déjà on ajoute seulement la quantité
            $positionProduit = array_search($idVin,  $_SESSION['panierVin']['idVin']);

            if ($positionProduit !== false) {
                $_SESSION['panierVin']['nombreBouteille'][$positionProduit] += $nombreBouteille ;
            }
            else {
                //Sinon on ajoute le produit
                array_push( $_SESSION['panierVin']['idVin'],$idVin);
                array_push( $_SESSION['panierVin']['nombreBouteille'],$nombreBouteille);
                array_push( $_SESSION['panierVin']['prixVin'],$prixVin);
            }
            return true;
        }
        else
            return false;
            //echo "Un problème est survenu veuillez contacter l'administrateur du site.";
    }

    public static function supprimerArticle($idVin){
        //Si le panierVin existe
        if (ModelPanier::creationpanierVin() && !ModelPanier::estVerrouille()) {
            //Nous allons passer par un panierVin temporaire
            $tmp=array();
            $tmp['idVin'] = array();
            $tmp['nombreBouteille'] = array();
            $tmp['prixVin'] = array();
            $tmp['verrou'] = $_SESSION['panierVin']['verrou'];

            for($i = 0; $i < count($_SESSION['panierVin']['idVin']); $i++)
            {
                if ($_SESSION['panierVin']['idVin'][$i] !== $idVin)
                {
                    array_push( $tmp['idVin'],$_SESSION['panierVin']['idVin'][$i]);
                    array_push( $tmp['nombreBouteille'],$_SESSION['panierVin']['nombreBouteille'][$i]);
                    array_push( $tmp['prixVin'],$_SESSION['panierVin']['prixVin'][$i]);
                }

            }
            //On remplace le panierVin en session par notre panierVin temporaire à jour
            $_SESSION['panierVin'] =  $tmp;
            //On efface notre panierVin temporaire
            unset($tmp);
        }
        else
            echo "Un problème est survenu veuillez contacter l'administrateur du site.";
    }

    public static function modifierQTeArticle($idVin,$nombreBouteille){

        //Si le panierVin existe
        if (ModelPanier::creationpanierVin() && !ModelPanier::estVerrouille()) {
            //Récupération du stock
            $vin = ModelVin::select($idVin);
            $stock = $vin->get('qteVin');

            //Si la quantité est positive on modifie sinon on supprime l'article
            if ($nombreBouteille > 0)
            {
                //Recherche du produit dans le panierVin
                $positionProduit = array_search($idVin,  $_SESSION['panierVin']['idVin']);

                if ($positionProduit !== false) {
                    if ($nombreBouteille <= $stock)
                        $_SESSION['panierVin']['nombreBouteille'][$positionProduit] = $nombreBouteille ;
                    else
                        $_SESSION['panierVin']['nombreBouteille'][$positionProduit] = $stock ;
                }
            }
            else
                ModelPanier::supprimerArticle($idVin);
        }
        else
            echo "Un problème est survenu veuillez contacter l'administrateur du site.";
    }

    public static function MontantGlobal() {
        $total=0;
        for($i = 0; $i < count($_SESSION['panierVin']['idVin']); $i++) {
            $total += $_SESSION['panierVin']['nombreBouteille'][$i] * $_SESSION['panierVin']['prixVin'][$i];
        }
        return $total;
    }

    public static function compterArticles() {
        if (isset($_SESSION['panierVin']))
            return count($_SESSION['panierVin']['idVin']);
        else
            return 0;
    }

    public static function supprimerpanierVin () {
        unset($_SESSION['panierVin']);
    }
}


/*Gestion du traitement d'un panierVin
 * $erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
   if(!in_array($action,array('ajout', 'suppression', 'refresh')))
   $erreur=true;

   //récuperation des variables en POST ou GET
   $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
   $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

   //Suppression des espaces verticaux
   $l = preg_replace('#\v#', '',$l);
   //On verifie que $p soit un float
   $p = floatval($p);

   //On traite $q qui peut etre un entier simple ou un tableau d'entier

   if (is_array($q)){
      $QteArticle = array();
      $i=0;
      foreach ($q as $contenu){
         $QteArticle[$i++] = intval($contenu);
      }
   }
   else
   $q = intval($q);

}

if (!$erreur){
   switch($action){
      Case "ajout":
         ajouterArticle($l,$q,$p);
         break;

      Case "suppression":
         supprimerArticle($l);
         break;

      Case "refresh" :
         for ($i = 0 ; $i < count($QteArticle) ; $i++)
         {
            modifierQTeArticle($_SESSION['panierVin']['idVin'][$i],round($QteArticle[$i]));
         }
         break;

      Default:
         break;
   }


-------------------------
Ajouter au panierVin <a href="panierVin.php?action=ajout&amp;l=idVin&amp;q=QUANTITEPRODUIT&amp;p=PRIXPRODUIT" onclick="window.open(this.href, '',
'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;">Ajouter au panierVin</a>
*/