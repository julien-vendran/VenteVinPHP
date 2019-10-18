<?php
    require_once __DIR__.DIRECTORY_SEPARATOR."lib".DIRECTORY_SEPARATOR."File.php";
    
    $path = File::build_path(array('controller','routeur.php'));
    require_once ($path);
?>