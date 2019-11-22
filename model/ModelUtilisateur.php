<?php

require_once File::build_path(array('model', 'Model.php'));

class ModelUtilisateur extends Model{
    protected static $nomTable = 'utilisateurs';
    protected static $nomClasse = 'ModelUtilisateur';
    protected static $primary = 'idUtilisateur';


    private $idUtilisateur;
    private $loginUtilisateur;
    private $mdpUtilisateur;
    private $nomUtilisateur;


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
}