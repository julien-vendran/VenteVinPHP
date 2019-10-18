<?php

$path_array = array('model','Model.php');
$path = File::build_path($path_array);
require_once ($path);

class ModelVoiture {

    private $marque;
    private $couleur;
    private $immatriculation;

    //Méthode Statique
    static public function getAllVoitures() {
        $rep = Model::$pdo->query("SELECT * FROM voiture");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
        return $rep->fetchAll();
    }

    static public function getVoitureByImmat($immat) {
        $sql = "SELECT * from voiture WHERE immatriculation=:imat_sql";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "imat_sql" => $immat,
        ); 
        $req_prep->execute($values);
        
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
        $tab_voit = $req_prep->fetchAll();
        if (empty($tab_voit))
            return false;
        return $tab_voit[0];
    }

    public function getMarque() {
        return $this->marque;
    }

    public function getCouleur() {
        return $this->couleur;
    }

    public function getImmatriculation() {
        return $this->immatriculation;
    }

    public function setMarque($marque2) {
        $this->marque = $marque2;
    }

    public function setCouleur($couleur2) {
        $this->couleur = $couleur2;
    }

    public function setImmatriculation($immatriculation2) {
        if (strlen(immatriculation2) == 8) {
            $this->immatriculation = $immatriculation2;
        }
    }

    public function save() {
        try {
            $sql = "INSERT INTO voiture (immatriculation, marque, couleur) VALUES (:sql_imat, :sql_marque, :sql_couleur)";
            $req_prep = MODEL::$pdo->prepare($sql);
            $values = array(
                "sql_imat" => $this->immatriculation,
                "sql_marque" => $this->marque,
                "sql_couleur" => $this->couleur
            );
            $req_prep->execute($values);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public function delete() {
        try{
            $sql = "DELETE FROM voiture WHERE immatriculation=:sql_imat";
            $req_prep = MODEL::$pdo->prepare($sql);
            $values = array(
                "sql_imat" => $this->immatriculation
            );
            $req_prep->execute($values);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function update($data){
        try{
            $sql = "UPDATE voiture SET marque=:sql_marque, couleur=:sql_couleur WHERE immatriculation=:sql_immat";
            $req_prep = MODEL::$pdo->prepare($sql);
            $values = array(
                "sql_immat" => $data[0],
                "sql_marque" => $data[1],
                "sql_couleur" => $data[2]
            );
            $req_prep->execute($values);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    // un constructeur
    public function __construct($m = NULL, $c = NULL, $i = NULL) {
        if (!is_null($m) && !is_null($c) && !is_null($i)) {
            $this->marque = $m;
            $this->couleur = $c;
            $this->immatriculation = $i;
        }
    }

    // une methode d'affichage.
    /*public function afficher() {
        echo("Voiture $this->immatriculation de marque $this->marque (couleur $this->couleur). <br>");
    }*/

}

?>
