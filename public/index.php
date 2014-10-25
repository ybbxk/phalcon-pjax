<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

use \Phalcon\Exception as PhalconException;

// Application assumes the app and public folder are located in
// the actual document root.
define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('APP', DOCUMENT_ROOT . '/app');
define('PUBLIC', DOCUMENT_ROOT . '/public');

try {
	
	// Require the file that sets up our autoloader.
	require APP . '/config/autoloader.php';
	
	// Require the file that registers our services with the
	// dependency injector. Should set a global called $di.
	require APP . '/config/services.php';
	
	// Handle the request.
	$application = new \Phalcon\Mvc\Application($di);
	
	echo $application->handle()->getContent();
	
} catch (PhalconException $ex) {
	echo "PhalconException: ", $ex->getMessage();
}