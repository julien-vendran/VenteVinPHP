<?php
    require_once __DIR__.DIRECTORY_SEPARATOR."lib".DIRECTORY_SEPARATOR."File.php";
    
    $path_array = array('controller','routeur.php');
    $path = File::build_path($path_array);
    require_once ($path);
?>