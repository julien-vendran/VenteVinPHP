<?php
    require_once File::build_path(array('model', 'Model.php'));

    class ModelViticulteur extends Model {
        protected static $nomTable = 'viticulteurs';
        protected static $nomClasse = 'ModelViticulteur';
        protected static $primary = 'idViticulteur';

        private $idViticulteur;
        private $nomViticulteur;
        private $loginViticulteur;


        public function __construct($id= NULL, $nom = NULL, $login = NULL) {
            if (!is_null($id) && !is_null($nom) && !is_null($login)){
                $this->idViticulteur = $id;
                $this->nomViticulteur = $nom;
                $this->loginViticulteur = $login;
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
    }