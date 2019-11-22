<?php
//Créer la table utilisateur
/*CREATE TABLE `vendranj`.`Utilisateur_vin` ( `idUtilisateur` INT NOT NULL AUTO_INCREMENT , `loginUtilisateur` VARCHAR(32) NOT NULL , `mdpUtilisateur` VARCHAR(64) NOT NULL , `nomUtilisateur` INT NOT NULL , PRIMARY KEY (`idUtilisateur`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;
*/
class ControllerUtilisateur {

    public static function connectUser () {
        $controller = 'utilisateur';
        $view = 'connect';
        $pagetitle = 'Se connecter';
        require File::build_path(array('view', 'view.php'));
    }

    public static function connectedUser() {

    }
}