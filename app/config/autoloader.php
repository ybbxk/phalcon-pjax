<?php

$loader = new \Phalcon\Loader();

$loader->registerDirs([
	APP . '/controllers/',
	APP . '/models/'
]);

$loader->register();