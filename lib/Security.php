<?php


class Security {
    private static $seed = 'jAg0Pbj7pO';

    public static function chiffrer($texte_en_clair) {
        $texte_chiffre = hash('sha256', self::$seed . $texte_en_clair);
        return $texte_chiffre;
    }
}