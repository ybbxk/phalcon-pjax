<?php

return new \Phalcon\Config(array(
    'application' => array(
        'controllersDir' => APP . '/controllers/',
        'formsDir' => APP . '/forms/',
        'viewsDir' => APP . '/views/',
        'libraryDir' => APP . '/library/',
        'pluginsDir' => APP . '/plugins/',
        'baseUri' => '/',
        'publicUrl' => 'http://localhost/phalcon_pjax'
    )
));