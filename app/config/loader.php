<?php

//require_once(APP_PATH . '/../vendor/autoload.php');
require_once(dirname(dirname(APP_PATH)) . '/vendor/autoload.php');


$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */

//echo $config->application->libraryDir.'db/Adapter/';exit();

$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir,
        $config->application->libraryDir,
        $config->application->tasksDir,
        $config->application->libraryDir.'db/Adapter/',
        $config->application->libraryDir.'db/Dialect/',
    ]
)->register();


$loader->registerNamespaces([
	
	'Wss\Db\Adapter\Pdo' => $config->application->libraryDir.'db/Adapter/',
	'Wss\Db\Dialect' => $config->application->libraryDir.'db/Dialect/',
	
	'WssEnv' => $config->application->appDir,
	'WssEnv\Models' => $config->application->modelsDir,
	'WssEnv\Forms' => $config->application->formsDir,
	'WssEnv\Tasks' => $config->application->tasksDir,
	'WssEnv\Library' => $config->application->libraryDir,
	'WssEnv\View\Extensions' => $config->application->libraryDir.'views/',
	
])->register();

