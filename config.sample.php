<?php

define('PATH_PROJECT',    __DIR__ . '/');
define('PATH_APP',          PATH_PROJECT . 'app/');
define('PATH_FRAMEWORK',    PATH_PROJECT . 'fw/');
define('PATH_STORAGE',      PATH_PROJECT . 'storage/');
define('PATH_VENDORS',      PATH_PROJECT . 'vendors/');
define('PATH_COMMANDLINE',  PATH_FRAMEWORK . 'commandline/');
define('PATH_CONTROLLERS',  PATH_APP . 'controllers/');
define('PATH_MODELS',     	PATH_APP . 'models/');
define('PATH_VIEWS',      	PATH_APP . 'views/');

define('RET', PHP_EOL);
define('TAB', "\t");

$_config = [
    // *** Required Configurations *** //
	// * Add require configurations to array in Bootstrap::existConfig()
    'maint' => false, // Is in maintenance mode
    'dev' => false, // Is develeopment environment
    'debug' => false, // Is debug being used
	'debug_validation' => false, // Outputs debugging when doing validation into results
	'debug_show_script_run_time' => false, // Outputs at end how long code took
    'https' => true, // Is using https
    'domain' => 'localhost',
    // 'full_domain' => 'dynamically created within bootstrap',
    'timezone' => 'UTC', // America/New_York',
    'lock' => false, // Turns on HTTP authentication headers; mostly for locking a site but allowing only specific access
    'lock_user' => '', //
    'lock_pass' => '',
	'set_time_out' => 60,
    // *** Optional Configurations *** //
    'password_cost' => 11, 
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
    'upload' => array(
        'path' => PATH_STORAGE,
        'max' => 1024*1024*10,
        'types' => array(),
    ),
    'robotstxt' => array(
        'access' => false
    ),
];
