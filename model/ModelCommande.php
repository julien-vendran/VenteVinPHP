<?php
require_once File::build_path(array('model', 'Model.php'));

class ModelCommande{

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

    public static function insert($data) {
        return parent::insert($data);
    }

    public static function update($data, $primary) {
        return parent::update($data, $primary);
    }

    public static function delete($primary) {
        return parent::delete($primary);
    }

    public static function selectMax(){
        $sql = "SELECT max(numCommande) FROM Commandes";
        $req_prep = Model::$pdo->prepare($sql);

        $req_prep->execute();
        $req_prep->setFetchMode(PDO::fetch);
        $tab = $req_prep->fetchAll();

        return $tab[0];
    }
}