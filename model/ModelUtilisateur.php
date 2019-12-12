<?php

require_once File::build_path(array('model', 'Model.php'));

class ModelUtilisateur extends Model{
    protected static $nomTable = 'utilisateurs';
    protected static $nomClasse = 'ModelUtilisateur';
    protected static $primary = 'loginUtilisateur';


    private $loginUtilisateur;
    private $mdpUtilisateur;
    private $nomUtilisateur;
    private $emailUtilisateur;
    private $nonce;


    public function __construct($log = NULL, $mdp = NULL, $nom = NULL, $email = NULL, $n = NULL) {
        if (!is_null($log) && !is_null($mdp) && !is_null($nom) && !is_null($email) && !is_null($n)){
            $this->loginUtilisateur = $log;
            $this->mdpUtilisateur = $mdp;
            $this->nomUtilisateur = $nom;
            $this->emailUtilisateur = $email;
            $this ->nonce = $n;
        }
    }

    /**
     * @param $login (Login) est la login de l'utilisateur
     * Pré requis : l'utilisateur existe,
     * On teste si c'est un viticulteur, si c'est le cas, on modifie la session en conséquance (On lui attribue 2)
     * Sinon, étant donné qu'il existe dans la table utilisateur, on lui laisse ces droits là (On lui attribue 1)
     */
    public static function attributionDesDroits($login) {
        try {
            $sql = 'SELECT * FROM `Viticulteurs` WHERE loginViticulteur = :sql_login';
            $sql_prep = Model::$pdo->prepare($sql);

            $values = array(
                "sql_login" => $login
            );

            $sql_prep->execute($values);

            $sql_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelViticulteur');

            $reponse = $sql_prep->fetchAll();

            //On va se servir $_SESSION['rangDeLutilisateur'] savoir qui il est
            if (  ! empty($reponse)) { // Si la réponse est vide
                $_SESSION['rangDeLutilisateur'] = 2; //2 pour les viticulteurs
            } else {// Si la requête prof renvoie une réponse
                $_SESSION['rangDeLutilisateur'] = 1; // On défini 1 pour les utilisateurs
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
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