<?php

// Phalcon4 mssql adaptation: FedorFL "lefedor", ffl.public@gmail.com, websitespb.ru

$wDbg = false;
//$wDbg = true;

if($wDbg){
	
	//Development mode
	
	error_reporting(E_ALL);
	ini_set("display_startup_errors", "on");
	ini_set("display_errors", "on");
	ini_set("html_errors", "on");
	ini_set("log_errors", "on");
	ini_set("ignore_repeated_errors", "off");
	ini_set("ignore_repeated_source", "off");
	ini_set("report_memleaks", "on");
	ini_set("track_errors", "on");
	## enable PHP error logging
	#php_flag  log_errors on
	#php_value error_log  /home/path/public_html/domain/PHP_errors.log
	echo '<pre>';
	
}
else{
	
	//Production mode
	
	error_reporting(0);
	ini_set("display_startup_errors", "off");
	ini_set("display_errors", "off");
	ini_set("html_errors", "off");
	ini_set("ignore_repeated_errors", "on");
	ini_set("ignore_repeated_source", "on");
	ini_set("report_memleaks", "off");
	ini_set("track_errors", "off");
	error_reporting(0);
	
}


/*
 * Modified: prepend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */
defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');


$wPath = APP_PATH . '/library';

set_include_path(get_include_path() . PATH_SEPARATOR . $wPath);

$wPath = APP_PATH . '/library/_WSS';

set_include_path(get_include_path() . PATH_SEPARATOR . $wPath);

$wPath = dirname(dirname(APP_PATH));

set_include_path(get_include_path() . PATH_SEPARATOR . $wPath);


return new \Phalcon\Config([
  
    
	'database' => [
			'adapter'     => 'Wss\Db\Adapter\Pdo\Mssql',             // Check file loader.php

			'host'          => 'somehoest',                          // Server localhost if SQL on same server else use IP address of remote Server
			

			'username'      => 'someuser',                                 // Defult Username here
			'password'      => 'somepwd',               // Change Password here
			
			'dbname'        => 'somedb',                       // Database name
			'port'          => '1433',							//Optional
			
			
			//'pdoType'       => 'SQLSRV',                         // Don't change it
			'pdoType'       => 'DBLIB',                         // Don't change it
			
			'dialectClass'  => 'Wss\Db\Dialect\Mssql'                // Check file loader.php
			//'adapterClass'     => 'Wss\Db\Adapter\Pdo\Mssql'                // Check file loader.php
			
	],
    
    
    'application' => [
        'appDir'         => APP_PATH . '/',
        'controllersDir' => APP_PATH . '/controllers/',
        'modelsDir'      => APP_PATH . '/models/',
        'formsDir'       => APP_PATH . '/forms/',
        'migrationsDir'  => APP_PATH . '/migrations/',
        'viewsDir'       => APP_PATH . '/views/',
        'pluginsDir'     => APP_PATH . '/plugins/',
        'libraryDir'     => APP_PATH . '/library/',
        'cacheDir'       => BASE_PATH . '/cache/',
        'tasksDir'       => APP_PATH . '/tasks/',
        'baseUri'        => '/',
    ],
    
    
    
]);
