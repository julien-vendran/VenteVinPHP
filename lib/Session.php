<?php


class Session {
    public static function est_Connecte () {
        return (isset($_SESSION['estConnecteAuServeur']) && $_SESSION['estConnecteAuServeur']);
    }
}