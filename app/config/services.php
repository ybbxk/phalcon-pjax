<?php
/**
 * Sets up common services for use in the site.
 * 
 * Current includes:
 * - Base url
 * - Volt and PHP-based views.
 * - Session.
 * - Session flash messages.
 * - Database.
 */

// Create a DI.
$di = new \Phalcon\DI\FactoryDefault();

$config = require __DIR__ . "/general.php";

$di->set('url', function() use ($config) {
	$url = new \Phalcon\Mvc\Url();
	$url->setBaseUri($config->application->baseUri);
	return $url;
}, true);

// Use session file adapter and start the session if it isn't already.
// This check has to take place or it will attempt to start the session
// multiple times depending on how you use the DI in your application.
$di->set('session', function() {
	$session = new \Phalcon\Session\Adapter\Files();
	if(session_status() === PHP_SESSION_NONE) {
		$session->start();
	}
	return $session;
});

// Add support for glorious session flashes.
$di->set('flashSession', function() {
	return new \Phalcon\Flash\Session();
});

// Set up the view component.
$di->set('view', function() use ($di) {
	$view = new \Phalcon\Mvc\View();
	$view->setViewsDir('../app/views/');
	
	
	$events_manager= new \Phalcon\Events\Manager();
	
	
	 // Attach event listener to view.
	$events_manager->attach('view', function($event, $view) use ($di) {
		if($event->getType() == 'beforeRender') {

			$controller = $di->getShared('dispatcher')->getActiveController();

			if($controller->isPjax() && $controller->render_pjax === true) {
				echo 'RENDERING PJAX.';
				$controller->prepareForPjax();
			}
			else {
				echo 'RENDERING NORMAL RESPONSE.';
			}

		}
	});

	$view->setEventsManager($events_manager);
	
	
	// Registering Volt as template engine
	$view->registerEngines([
		".phtml" => 'Phalcon\Mvc\View\Engine\Php'
	]);

	return $view;
});