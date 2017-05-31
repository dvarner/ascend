<?php

define('PATH_PROJECT',   		__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);
define('PATH_APP',          	PATH_PROJECT . 'app' . DIRECTORY_SEPARATOR);
define('PATH_FRAMEWORK',    	PATH_PROJECT . 'fw' . DIRECTORY_SEPARATOR);
define('PATH_FEATURE',      	PATH_FRAMEWORK . 'feature' . DIRECTORY_SEPARATOR);
define('PATH_STORAGE',      	PATH_PROJECT . 'storage' . DIRECTORY_SEPARATOR);
define('PATH_VENDORS',      	PATH_PROJECT . 'vendors' . DIRECTORY_SEPARATOR);
define('PATH_COMMANDLINE',  	PATH_FRAMEWORK . 'commandline' . DIRECTORY_SEPARATOR);
define('PATH_CONTROLLERS',  	PATH_APP . 'controllers' . DIRECTORY_SEPARATOR);
define('PATH_MODELS',     		PATH_APP . 'models' . DIRECTORY_SEPARATOR);
define('PATH_VIEWS',      		PATH_APP . 'views' . DIRECTORY_SEPARATOR);
define('PATH_APP_COMMANDLINE',  PATH_APP . 'commandline' . DIRECTORY_SEPARATOR);

define('RET', PHP_EOL);
define('TAB', "\t");

$_config = array(
    // *** Required Configurations *** //
	// * Add require configurations to array in Bootstrap::existConfig()
    'debug' => false, // False = debug mode off, true = basic mode on, Make array for additional validiaton
    'dev' => false, // Is site in development mode; if not set then false
    'https' => true, // URL secure or not
    'lock' => false, // Turns on HTTP authentication headers; mostly for locking a site but allowing only specific access
    'maint' => false, // Is in maintenance mode
    'domain' => 'localhost',
    'timezone' => 'UTC', // America/New_York',
    // *** Optional Configurations *** //
    'db' => array(
        'local' => array(
            'name' => 'local',
            'type' => 'mysql',
            'hostname' => 'localhost',
            'database' => '',
            'username' => '',
            'password' => '',
        )
    ),
	'role' => array(
		'default' => 4,
	),
	
	// 'set_time_out' => 60,

    /*
	// * Only Need if debug is not false and is array * //
    'debug' => array(
        'validation' => false, // Outputs debugging when doing validation into results
        'script_runtime' => false, // Outputs at end how long code took
    )
     */

	// * Only need if lock = true */
	/*
    'lock_user' => '',
    'lock_pass' => '',
	*/
	
	/* Currently not used or working
    'password_cost' => 11,
    'upload' => array(
        'path' => PATH_STORAGE,
        'max' => 1024*1024*10,
        'types' => array(),
    ),
    'robotstxt' => array(
        'access' => false
    ),
	*/
);
