<?php namespace Ascend;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR . 'config.php';

require_once 'vendor/autoload.php';

use Ascend\Core\Session;
use Ascend\Core\CommandLine;

if (DEBUG) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

if (PHP_SAPI == 'cli') {
    define('IS_COMMANDLINE', true);
    set_time_limit(0);
} else {
    set_time_limit(SCRIPT_TIMEOUT);
    define('IS_COMMANDLINE', false);
}

if (FORCE_HTTPS && IS_COMMANDLINE === false) {
    if (empty($_SERVER['HTTPS'])) {
        header('Location: https://' . DOMAIN);
        exit;
    }
}

if (!IS_COMMANDLINE) {
    Session::start();
    require_once PATH_APP . 'routes.php';
} else {
    CommandLine::init();
}
