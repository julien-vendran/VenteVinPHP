<?php
require_once File::build_path(array('model', 'Model.php'));

class ModelCommande extends Model{

    protected static $nomTable = 'commandes';
    protected static $nomClasse = 'ModelCommande';
    protected static $primary = 'numCommande';

    private $numCommande;
    private $dateCommande;
    private $idUtilisateur;
    private $montantCommande;


    public function __construct($num = NULL, $date = NULL, $id = NULL, $montant = NULL) {
        if (!is_null($num) && !is_null($date) && !is_null($id) && !is_null($montant)){
            $this->numCommande = $num;
            $this->dateCommande = $date;
            $this->idUtilisateur = $id;
            $this->montantCommande = $montant;
        }
    }

    public function get($nom_attribut) {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    public static function selectAll() {
        return parent::selectAll();
    }

    public static function select($primary_value) {
        return parent::select($primary_value);
    }

    public static function selectAllCommandeByUtilisateur(){
        $sql = "SELECT numCommande, dateCommande, montantCommande FROM commandes WHERE loginUtilisateur=:sql_loginUtilisateur";
        $req = Model::$pdo->prepare($sql);
        $values = array(
            "sql_loginUtilisateur" => $_SESSION['login']
        );
        $req->execute($values);
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $tab_commande = $req->fetchAll();
        if(empty($tab_commande))
            return false;
        return $tab_commande;
    }

    public static function selectLigneCommandeByCommande($numCommande){
        $sql = "SELECT idVin, quantite FROM lignescommande WHERE numCommande=:sql_numCommande";
        $req = Model::$pdo->prepare($sql);
        $values = array(
            "sql_numCommande" => $numCommande
        );
        $req->execute($values);
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $tab_ligneCommande = $req->fetchAll();
        if(empty($tab_ligneCommande))
            return false;
        return $tab_ligneCommande;
    }

    public static function insert($data) {
        return parent::insert($data);
    }

    public static function insertLigne($data) {
        try {
            $pdo = self::$pdo;
            $a = implode(',',$data);
            $sql = "INSERT INTO lignesCommande VALUES (".$a.")";
            $requete = $pdo->prepare($sql);
            $requete->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public static function update($data, $primary) {
        return parent::update($data, $primary);
    }

    public static function delete($primary) {
        return parent::delete($primary);
    }

    public static function selectMax(){
        $sql = "SELECT max(numCommande) FROM commandes";
        $req_prep = Model::$pdo->prepare($sql);

        $req_prep->execute();
        $req_prep->setFetchMode(PDO::FETCH_BOTH);
        $tab = $req_prep->fetchAll();

        return $tab[0];
    }

    public static function enregistrerCommande($login, $panier){
        $values = array(
            'loginUtilisateur' => $login,
            'montantCommande' => ModelPanier::MontantGlobal(),
        );

        ModelCommande::insert($values); //Insére la commande
        $numCommande = ModelCommande::selectMax(); //Récupère le numCommande que l'on vient de créer
        $nbVin = count($panier['idVin']);

        $i=0;
        for($i; $i<$nbVin; $i++){
            $values = array(
                'numCommande' => $numCommande[0],
                'idVin' => $panier['idVin'][$i],
                'quantite' => $panier['nombreBouteille'][$i]
            );

            ModelCommande::insertLigne($values); //Insére les lignesCommandes

            $quantite = $panier['nombreBouteille'][$i];
            $qte = ModelVin::select($panier['idVin'][$i]);
            $newstock = $qte->get('qteVin') - $quantite;
            $data = array(
                'qteVin' => $newstock
            );
            ModelVin::update($data, $panier['idVin'][$i]); //Met à jour les stocks
            ModelPanier::supprimerArticle($panier['idVin'][$i]); //Vide le panier
        }
    }

}