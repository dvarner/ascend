<?php namespace Ascend;

define(ASCENDPHP_VENDOR_PATH,'vendor/dvarner/ascendphp-core/src/');
require_once __DIR__ . DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR . 'config.php';
require_once ASCENDPHP_VENDOR_PATH . 'Ascend/Core/_functions.php';
require_once 'vendor/autoload.php';

use Ascend\Core\Session;
use Ascend\Core\CommandLine;

spl_autoload_register(function ($className) {
    $getFilePath = str_replace('\\', '/', $className);
    $requirePath = PATH_PROJECT . $getFilePath . '.php';
    if (false !== ($pos = strpos($className, 'Ascend')) && $pos === 0) {
        // If file is within the Ascend\\ Namespace Structure like (Example)
        $requirePath = PATH_PROJECT . ASCENDPHP_VENDOR_PATH . $getFilePath . '.php';
    }
    if (file_exists($requirePath)) {
        require_once $requirePath;
    }
});

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
