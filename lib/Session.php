<?php


class Session {
    public static function est_Connecte () {
        return (isset($_SESSION['estConnecteAuServeur']) && $_SESSION['estConnecteAuServeur']);
    }

    /*
     * Partie de gestion d'un panier
     */
    public static function creationPanier(){
        if (!isset($_SESSION['panierVin'])){
            $_SESSION['panierVin']=array();
            $_SESSION['panierVin']['idVin'] = array();
            $_SESSION['panierVin']['nombreBouteille'] = array();
            $_SESSION['panierVin']['prixVin'] = array();
            $_SESSION['panierVin']['verrou'] = false; // Permet de ne plus pouvoir modifier le panier (Lors du paiement pas exemple)
        }
        return true;
    }

    private static function estVerrouille() {
        return (isset($_SESSION['panierVin']['verrou']) && $_SESSION['panierVin']['verrou']);
    }

    public static function ajouterArticle($idVin, $nombreBouteille,$prixVin){

        //Si le panier existe
        if (Session::creationPanier() && !Session::estVerrouille())
        {
            //Si le produit existe déjà on ajoute seulement la quantité
            $positionProduit = array_search($idVin,  $_SESSION['panier']['libelleProduit']);

            if ($positionProduit !== false)
            {
                $_SESSION['panier']['qteProduit'][$positionProduit] += $nombreBouteille ;
            }
            else
            {
                //Sinon on ajoute le produit
                array_push( $_SESSION['panier']['idVin'],$idVin);
                array_push( $_SESSION['panier']['nombreBouteille'],$nombreBouteille);
                array_push( $_SESSION['panier']['prixVin'],$prixVin);
            }
        }
        else
            echo "Un problème est survenu veuillez contacter l'administrateur du site.";
    }

    public static function supprimerArticle($libelleProduit){
        //Si le panier existe
        if (Session::creationPanier() && !Session::estVerrouille()) {
            //Nous allons passer par un panier temporaire
            $tmp=array();
            $tmp['idVin'] = array();
            $tmp['nombreBouteille'] = array();
            $tmp['prixVin'] = array();
            $tmp['verrou'] = $_SESSION['panier']['verrou'];

            for($i = 0; $i < count($_SESSION['panier']['idVin']); $i++)
            {
                if ($_SESSION['panier']['libelleProduit'][$i] !== $libelleProduit)
                {
                    array_push( $tmp['idVin'],$_SESSION['panier']['idVin'][$i]);
                    array_push( $tmp['nombreBouteille'],$_SESSION['panier']['nombreBouteille'][$i]);
                    array_push( $tmp['prixVin'],$_SESSION['panier']['prixVin'][$i]);
                }

            }
            //On remplace le panier en session par notre panier temporaire à jour
            $_SESSION['panier'] =  $tmp;
            //On efface notre panier temporaire
            unset($tmp);
        }
        else
            echo "Un problème est survenu veuillez contacter l'administrateur du site.";
    }

    public static function modifierQTeArticle($libelleProduit,$qteProduit){
        //Si le panier éxiste
        if (Session::creationPanier() && !Session::estVerrouille())
        {
            //Si la quantité est positive on modifie sinon on supprime l'article
            if ($qteProduit > 0)
            {
                //Recharche du produit dans le panier
                $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['idVin']);

                if ($positionProduit !== false)
                {
                    $_SESSION['panier']['nombreBouteille'][$positionProduit] = $qteProduit ;
                }
            }
            else
                Session::supprimerArticle($libelleProduit);
        }
        else
            echo "Un problème est survenu veuillez contacter l'administrateur du site.";
    }

    public static function MontantGlobal() {
        $total=0;
        for($i = 0; $i < count($_SESSION['panier']['idVin']); $i++) {
            $total += $_SESSION['panier']['nombreBouteille'][$i] * $_SESSION['panier']['prixVin'][$i];
        }
        return $total;
    }

    public static function compterArticles() {
        if (isset($_SESSION['panier']))
            return count($_SESSION['panier']['idVin']);
        else
            return 0;
    }

    public static function supprimerPanier () {
        unset($_SESSION['panier']);
    }
}


/*Gestion du traitement d'un panier
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
            modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i],round($QteArticle[$i]));
         }
         break;

      Default:
         break;
   }


-------------------------
Ajouter au panier <a href="panier.php?action=ajout&amp;l=LIBELLEPRODUIT&amp;q=QUANTITEPRODUIT&amp;p=PRIXPRODUIT" onclick="window.open(this.href, '',
'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;">Ajouter au panier</a>

}*/