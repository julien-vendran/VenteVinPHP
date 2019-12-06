<?php

    require_once (File::build_path(array('model','Model.php')));

    class ModelVin extends Model {
        protected static $nomTable = 'vins';
        protected static $nomClasse = 'ModelVin';
        protected static $primary = 'idVin';

        private $idVin; // Clé primaire
        private $nomVin; //Varchar(30)
        private $anneeVin; //year
        private $descriptionVin; //Varchar(500)
        private $typeVin; //Blanc, rouge, ... varchar(15)
        private $medailleVin; // par défaut null -- varchar(10)
        private $prixVin; // INT
        private $qteVin; //int
        private $imageVin; //Varchar(20)
        private $idDomaine; //Clé étrangère

        //Constrcuteur
        public function __construct($idV = NULL, $nomV = NULL, $anneV = NULL, $descrV = NULL, $typeV = NULL, $medVin = NULL, $prixV = NULL, $qteVin = NULL, $idDom = NULL, $imageVin = NULL) {
            if (!is_null($idV) && !is_null($nomV) && !is_null($anneV) && !is_null($descrV) && !is_null($typeV) && !is_null($prixV) && !is_null($qteVin) && !is_null($idDom) && !is_null($imageVin)) {
                $this->idVin = $idV;
                $this->nomVin = $nomV;
                $this->anneeVin = $anneV;
                $this->descriptionVin = $descrV;
                $this->typeVin = $typeV;
                $this->medailleVin = "";
                $this->prixVin = $prixV;
                $this->qteVin = $qteVin;
                $this->imageVin = $imageVin;
                $this->idDomaine = $idDom;
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

        public static function select($primary) {
            return parent::select($primary);
        }

        /*public static function insert($data) {
            return parent::insert($data);
        }*/

        public static function update($data, $primary) {
            return parent::update($data, $primary);
        }

        public static function delete($primary) {
            return parent::delete($primary);
        }
    }
