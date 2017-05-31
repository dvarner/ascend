<?php

$pathProject = __DIR__;
$pathProject = substr($pathProject, 0 , -3);

define('PATH_PROJECT',          $pathProject);
define('PATH_APP',              PATH_PROJECT . 'app' . DIRECTORY_SEPARATOR);
define('PATH_FRAMEWORK',        PATH_PROJECT . 'fw' . DIRECTORY_SEPARATOR);
define('PATH_FEATURE',          PATH_FRAMEWORK . 'feature' . DIRECTORY_SEPARATOR);
define('PATH_STORAGE',          PATH_PROJECT . 'storage' . DIRECTORY_SEPARATOR);
define('PATH_VENDORS',          PATH_PROJECT . 'vendors' . DIRECTORY_SEPARATOR);
define('PATH_COMMANDLINE',      PATH_FRAMEWORK . 'commandline' . DIRECTORY_SEPARATOR);
define('PATH_CONTROLLERS',      PATH_APP . 'controllers' . DIRECTORY_SEPARATOR);
define('PATH_MODELS',           PATH_APP . 'models' . DIRECTORY_SEPARATOR);
define('PATH_VIEWS',            PATH_APP . 'views' . DIRECTORY_SEPARATOR);
define('PATH_APP_COMMANDLINE',  PATH_APP . 'commandline' . DIRECTORY_SEPARATOR);
unset($pathProject);

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
    'password_cost' => 10,
    'db' => array(
        'default' => array(
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
);
