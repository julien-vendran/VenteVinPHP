<?php

require_once File::build_path(array('controller', 'ControllerVin.php'));

$action = $_GET['action'];

ControllerVin::$action(); 
?>