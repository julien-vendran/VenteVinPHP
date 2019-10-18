<?php
require_once '../lib/File.php';
$path_array = array('model','Model.php');
$path = File::build_path($path_array);
require_once ($path);

class ModelVin {

    private $idVin; // Clé primaire 
    private $nomVin;
    private $anneeVin;
    private $descriptionVin;
    private $typeVin;
    private $medailleVin;
    private $prixVin;
    private $idDomaine; //Clé étrangère

    //Méthode Statique
    static public function getAllvins() {
        $rep = Model::$pdo->query("SELECT * FROM vin_vin");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'Modelvin');
        return $rep->fetchAll();
    }

    static public function getvinById($id) {
        $sql = "SELECT * from vin_vin WHERE idVin=:id_sql";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "id_sql" => $id,
        ); 
        $req_prep->execute($values);
        
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelVin');
        $tab_voit = $req_prep->fetchAll();
        if (empty($tab_voit))
            return false;
        return $tab_voit[0];
    }

    public function get($attribut) {
        return $this->$attribut;
    }

    public function set($attribut, $valeur) {
        $this->$attribut = $valeur;
    }

    public function save() {
        try {
            $sql = "INSERT INTO vin_vin (idVin, nomVin, idDomaine, anneeVin, descriptionVin, typeVin, medailleVin, prixVin) VALUES (:sql_idVin, :sql_nomVin, :sql_idDomaine, :sql_anneeVin, :sql_descriptionVin, :sql_typeVin, :sql_medailleVin, :sql_prixVin)";
            $req_prep = MODEL::$pdo->prepare($sql);
            $values = array(
                "sql_idVin" => $this->idVin, 
                "sql_nomVin" => $this->nomVin, 
                "sql_idDomaine" => $this->idDomaine, 
                "sql_anneeVin" => $this->anneeVin, 
                "sql_descriptionVin" => $this->descriptionVin, 
                "sql_typeVin" => $this->typeVin, 
                "sql_medailleVin" => $this->medailleVin, 
                "sql_prixVin" => $this->prixVin
            );
            $req_prep->execute($values);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public function delete() {
        try{
            $sql = "DELETE FROM vin_vin WHERE idVin=:sql_idVin";
            $req_prep = MODEL::$pdo->prepare($sql);
            $values = array(
                "sql_idVin" => $this->idVin
            );
            $req_prep->execute($values);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function update($data){
        try{
            // $sql = "UPDATE vin_vin SET marque=:sql_marque, couleur=:sql_couleur WHERE immatriculation=:sql_immat";
            $sql = "UPDATE vin_vin SET nomVin = :sql_nomVin, idDomaine = :sql_idDomaine, anneeVin = :sql_anneeVin, descriptionVin = :sql_descriptionVin, typeVin = :sql_typeVin, medailleVin = :sql_medailleVin, prixVin = :sql_prixVin WHERE idVin=:sql_idVin";
            $req_prep = MODEL::$pdo->prepare($sql);
            $values = array(
                "sql_idVin" => $data['idVin'], 
                "sql_nomVin" => $data['nomVin'], 
                "sql_idDomaine" => $data['idDomaine'], 
                "sql_anneeVin" => $data['anneeVin'], 
                "sql_descriptionVin" => $data['descriptionVin'], 
                "sql_typeVin" => $data['typeVin'], 
                "sql_medailleVin" => $data['medailleVin'], 
                "sql_prixVin" => $data['prixVin']
            );
            $req_prep->execute($values);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    // un constructeur
    public function __construct($data) {
       $this->idVin = $data['idVin'],
       $this->nomVin = $data['nomVin'],
       $this->idDomaine = $data['idDomaine'],
       $this->anneeVin = $data['anneeVin'],
       $this->descriptionVin = $data['descriptionVin'],
       $this->typeVin = $data['typeVin'],
       $this->medailleVin = $data['medailleVin'],
       $this->prixVin = $data['prixVin']
    }

    // une methode d'affichage.
    /*public function afficher() {
        echo("vin $this->immatriculation de marque $this->marque (couleur $this->couleur). <br>");
    }*/

}

?>
