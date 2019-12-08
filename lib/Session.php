<?php


class Session {
    public static function est_Connecte() {
        return (isset($_SESSION['estConnecteAuServeur']) && $_SESSION['estConnecteAuServeur']);
    }

    public static function deconnecte_Utilisateur () {
        $_SESSION['estConnecteAuServeur'] = false;
        Session::detruite_session();
    }

    public static function detruite_session () {
        session_unset();     // unset $_SESSION variable for the run-time
        session_destroy();   // destroy session data in storage
        setcookie(session_name(),'',time()-1); // deletes the session cookie containing the session ID
    }

    public static function est_utilisateur () {
        return (isset($_SESSION['rangDeLutilisateur']) && $_SESSION['rangDeLutilisateur'] == 1) || Session::est_administrateur();
    }

    public static function est_viticuleur() { // Un viticulteur pourra proposer son vin en plus de ce que peut faire un utilisateur
        return (isset($_SESSION['rangDeLutilisateur']) && $_SESSION['rangDeLutilisateur'] == 2) || Session::est_administrateur();
    }

    public static function est_administrateur() {
        return (isset($_SESSION['rangDeLutilisateur']) && $_SESSION['rangDeLutilisateur'] == 3);
    }
}