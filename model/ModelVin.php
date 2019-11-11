<?php
require_once '../lib/File.php';
$path_array = array('model','Model.php');
$path = File::build_path($path_array);
require_once ($path);

class ModelVin
{

    private $idVin; // Clé primaire 
    private $nomVin;
    private $anneeVin;
    private $descriptionVin;
    private $typeVin;
    private $medailleVin;
    private $prixVin;
    private $idDomaine; //Clé étrangère

    //Constrcuteur
    public function __construct($idV = NULL, $nomV = NULL, $anneV = NULL, $descrV = NULL, $typeV = NULL, $medV = NULL, $prixV = NULL, $idDom = NULL)
    {
        if (is_null($idV) && is_null($nomV) && is_null($anneV) && is_null($descrV) && is_null($typeV) && is_null($medV) && is_null($prixV) && is_null($idDom)) {
            $this->idVin = $idV;
            $this->nomVin = $nomV;
            $this->anneeVin = $anneV;
            $this->descriptionVin = $descrV;
            $this->typeVin = $typeV;
            $this->medailleVin = $medV;
            $this->prixVin = $prixV;
            $this->idDomaine = $idDom;
        }
    }


    public function get($nom_attribut)
    {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    public static function selectAll()
    {
        return parent::selectAll();
    }

    public static function select($primary_value)
    {
        return parent::select($primary_value);
    }

    public static function insert($data)
    {
        return parent::insert($data);
    }

    public static function update($data, $primary)
    {
        return parent::update($data, $primary);
    }

    public static function delete($primary)
    {
        return parent::delete($primary);
    }
}
