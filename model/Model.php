<?php
require_once (File::build_path(array('config','Conf.php')));
class Model{
    public static $pdo;

    public static function Init(){
        $hostname = Conf::getHostname();
        $database_name = Conf::getDatabase();
        $login = Conf::getLogin();
        $password = Conf::getPassword();
        try{
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name",$login,$password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) { /*On lance une alerte à l'utilisateur*/
            echo 'pb bd';
        }
    }
    public static function selectAll(){
        try {
            $pdo = self::$pdo;
            $nomTable = static::$nomTable;
            $nomClasse = static::$nomClasse;

            $sql = "SELECT * FROM `{$nomTable}`";
            $requete = $pdo->query($sql);
            $requete->setFetchMode(PDO::FETCH_CLASS, $nomClasse);
            return $requete->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public static function select($primary_value){
        try {
            $pdo = self::$pdo;
            $nomTable = static::$nomTable;
            $nomClasse = static::$nomClasse;
            $clePrimaire = static::$primary;

            $sql = "SELECT * FROM `{$nomTable}` WHERE `{$clePrimaire}`=:sql_pk";
            $requete = $pdo->prepare($sql);
            $valeur = array(
                "sql_pk" => $primary_value);

            $requete->execute($valeur);
            $requete->setFetchMode(PDO::FETCH_CLASS, $nomClasse);
            $objet = $requete->fetchAll();
            if (isset($objet[0]))
                return $objet[0];
            else
                return null;

        } catch (PDOException $e) {
            return false;
        }
    }
    public static function insert($data){
        try {
            $pdo = self::$pdo;
            $nomTable = static::$nomTable;
            foreach ($data as $attribut => $tuple){
                $tabColonne[] = "`{$attribut}`";
                $tabValeur[] = "'{$tuple}'";}

            $sql = "INSERT INTO `{$nomTable}` (".implode(', ', $tabColonne).")"."
                        VALUES (".implode(', ', $tabValeur).")";
            $requete = $pdo->prepare($sql);
            $requete->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    public static function update($data,$primary){
        try {
            $pdo = self::$pdo;
            $nomTable = static::$nomTable;
            $clePrimaire = static::$primary;

            foreach ($data as $attribut => $tuple){
                $setColumn[] = "{$attribut} = '{$tuple}'";}

            $sql = "UPDATE `{$nomTable}` SET ".implode(', ', $setColumn)."
                 WHERE `{$clePrimaire}`=:sql_pk";
            $requete = $pdo->prepare($sql);
            $valeur = array(
                "sql_pk" => $primary);

            $requete->execute($valeur);
            return true;
        }catch (PDOException $e){
            return false;
        }
    }
    public static function delete($primary){
        try {
            $pdo = self::$pdo;
            $nomTable = static::$nomTable;
            $nomClasse = static::$nomClasse;
            $clePrimaire = static::$primary;

            $sql = "DELETE FROM `{$nomTable}` WHERE `{$clePrimaire}`=:sql_pk";
            $requete = $pdo->prepare($sql);
            $valeur = array(
                "sql_pk" => $primary);

            $requete->execute($valeur);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
Model::Init();