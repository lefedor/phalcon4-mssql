<?php

declare(strict_types=1);

use Phalcon\Escaper;
use Phalcon\Flash\Direct as Flash;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Session\Adapter\Stream as SessionAdapter;
use Phalcon\Session\Manager as SessionManager;
use Phalcon\Session\Bag as SessionBag;
use Phalcon\Url as UrlResolver;

/*================================================================*/

/* . BEFORE DB . */

/*================================================================*/

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->setShared('db', function () {
    
    $config = $this->getConfig();

	if ($config->database->adapter != 'Wss\Db\Adapter\Pdo\Mssql') {
		$class = 'Phalcon\Db\Adapter\Pdo\\' . $config->database->adapter;
	}
	else{
		$class = $config->database->adapter;
	}
	
    $params = [
        'host'     => $config->database->host,
        'port'     => $config->database->port,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname'   => $config->database->dbname,
        'charset'  => $config->database->charset,
        'pdoType'  => $config->database->pdoType,
    ];

    if ($config->database->adapter == 'Postgresql') {
        
        unset($params['charset']);
        
    }
	
	$wAdapter = new $class($params);
	
    return $wAdapter;
    
});


/*================================================================*/

/* . AFTER DB . */

/*================================================================*/

/*================================================================*/

/*

TODO

*/
