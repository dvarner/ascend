<?php

define('TAB',"\t");
define('RET',"\r\n");
define('DS', DIRECTORY_SEPARATOR);

// None of the following PATH_*** need to change.

// define('ASCENDPHP_VENDOR_PATH',''); // this is in bootstrap; just have this here so you know its available.
define('PATH_PROJECT',          __DIR__ . DS . '..' . DS);
define('PATH_ASCEND_CORE',      PATH_PROJECT . 'vendor' . DS . 'dvarner' . DS . 'ascendphp-core' . DS . 'src' . DS);
define('PATH_APP',              PATH_PROJECT . 'App' . DS);
define('PATH_COMMANDLINE',      PATH_APP . 'CommandLine' . DS);
define('PATH_CONTROLLERS',      PATH_APP . 'Controller' . DS);
define('PATH_MODELS',           PATH_APP . 'Model' . DS);
define('PATH_VIEWS',            PATH_APP . 'View' . DS);
define('PATH_FRAMEWORK',        PATH_PROJECT . 'Framework' . DS);
define('PATH_STORAGE',          PATH_PROJECT . 'storage' . DS);
define('PATH_VENDORS',     	    PATH_PROJECT . 'vendor' . DS);
define('PATH_IMAGES',      	    PATH_STORAGE . 'images' . DS);
define('PATH_LOG',              PATH_STORAGE . 'log' . DS);
define('PATH_PUBLIC',      	    PATH_PROJECT . 'public' . DS);
define('PATH_ASSETS',      	    PATH_PUBLIC . 'assets' . DS);

ini_set('session.save_path','/tmp'); // on cpanel /home/[user]/tmp

define('ENV', 'dev'); // stage, prod
define('DEBUG', true);
define('FORCE_HTTPS', true);
define('TIMEZONE_DEFAULT', 'UTC');
// define('IS_COMMANDLINE', true); // this is in bootstrap; just have this here so you know its available.
define('SCRIPT_TIMEOUT', 60);
define('PASSWORD_COST', 11);
define('DOMAIN','example.com');
define('DEFAULT_EMAIL','');


// Assumes MySQL; currently have not tested other version but using PDO
define('DB_HOST','localhost');
define('DB_NAME','');
define('DB_USER','');
define('DB_PASS', '');
define('DB_LOG_QUERIES', true);

/*
 *  Might turn this on; if needed; at a later time
 *
define('ASCEND_MODULES_NAMESPACES_LOAD', [
'Ascend\\Example',
]);
 */
