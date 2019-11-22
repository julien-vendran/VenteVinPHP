<?php


class Security {
    private static $seed = 'jAg0Pbj7pO';

    public static function chiffrer($texte_en_clair) {
        $texte_chiffre = hash('sha256', self::$seed . $texte_en_clair);
        return $texte_chiffre;
    }

    public static function checkMotDePasse($login, $mot_de_passe_chiffre) {
        try {
            $sql = "SELECT * FROM utilisateurs WHERE loginUtilisateur =:sql_login AND mdpUtilisateur =:sql_mdp;";
            $prep = Model::$pdo->prepare($sql);

            $values = array(
                "sql_login" => $login,
                "sql_mdp" => $mot_de_passe_chiffre
            );

            $prep->execute($values);
            $prep->setFetchMode(PDO::FETCH_CLASS, 'utilisateurs');
            $objet = $prep->fetchAll();

            if (isset($objet[0]))
                return $objet[0];
            else
                return null;

        } catch (PDOException $e) {
            var_dump($e);
        }
    }
}