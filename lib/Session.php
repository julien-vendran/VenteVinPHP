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
}