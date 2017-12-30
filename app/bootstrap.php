<?php
// Load config
    require_once 'config/config.php';
// Load libraries
//    require_once 'libraries/Core.php';
//    require_once 'libraries/Database.php';
//    require_once 'libraries/Controller.php';

// autoload core libraries - replaces above
spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
});