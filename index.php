<?php

session_start();

// define directory seperator
define('DS', DIRECTORY_SEPARATOR);

// define root
define('ROOT', dirname(__FILE__)); 

// get url
/* action is last part of URL sent back to index as ?url=* */
$url = (isset($_GET['url'])) ? $_GET['url'] : '';

// load bootstrap
require_once(ROOT . DS . 'core' . DS . 'bootstrap.php'); 
