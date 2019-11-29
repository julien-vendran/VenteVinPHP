<?php
session_start();
    require_once __DIR__.DIRECTORY_SEPARATOR."lib".DIRECTORY_SEPARATOR."File.php";
    require_once File::build_path(array('lib', 'Security.php'));
    require_once File::build_path(array('controller','routeur.php'));
    require_once File::build_path(array('model', 'ModelPanier.php'));

    ModelPanier::creationpanierVin();