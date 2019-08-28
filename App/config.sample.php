<?php

/*
 * ##############################
 * ## Setup ##
 * ##############################
 *
 * Change out config.php db user connections and domain. leave all PATH's alone unless you know what your doing.
 *
 * Run the following commands
mkdir storage
mkdir storage/log
chmod -R 777 storage/
chmod 755 storage/
 *
 * Setup Cron
php /path-to-root-of-ascendphp-framework/bootstrap_cron.php > /dev/null 2>&1
 */

ini_set('session.save_path','/tmp'); // on cpanel /home/[user]/tmp

define('TAB',"\t");
define('RET',"\r\n");
define('DS', DIRECTORY_SEPARATOR);

define('PATH_PROJECT',          __DIR__ . DS . '..' . DS);
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

define('ENV', 'dev'); // stage, prod
define('DEBUG', true);
define('FORCE_HTTPS', true);
define('TIMEZONE_DEFAULT', 'UTC');
// define('IS_COMMANDLINE', true); // this is in bootstrap
define('SCRIPT_TIMEOUT', 60);
define('PASSWORD_COST', 11);
define('DOMAIN','example.com');
define('DEFAULT_EMAIL','');

// Assumes MySQL; currently no other option
define('DB_HOST','localhost');
define('DB_NAME','');
define('DB_USER','');
define('DB_PASS', '');
define('DB_LOG_QUERIES', true);

