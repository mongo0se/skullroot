<?php

// load configuration and helper functions
require_once(ROOT . DS . 'config' . DS . 'config.php');
require_once(ROOT . DS . 'core' . DS . 'functions.php');

// autoload classes
function __autoload($className) {

	$path = array(
		'core' => ROOT . DS . 'core' . DS . strtolower($className) . '.php',
		'app' => ROOT . DS . 'application' . DS . 'controller' . DS . strtolower($className) . '.php',
		'model' => ROOT . DS . 'application' . DS . 'model' . DS . strtolower($className) . '.php'
	);

	// check core directory
	if (file_exists($path['core'])) {
        require_once($path['core']);
    } 

	// check app controllers
	else if (file_exists($path['app'])) {
        require_once($path['app']);
    }

	// load models
	else if (file_exists($path['model'])) {
        require_once($path['model']);
    }

	else if (file_exists(ROOT . DS . 'core' . DS . 'sql.php')) {
        require_once(ROOT . DS . 'core' . DS . 'sql.php');
    }
}

// route the request
Router::route($url); 
