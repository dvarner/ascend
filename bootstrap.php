<?php namespace Ascend;

/**
 * From command line run the following:
 * php mimic
 */

/**
 * These are static Classes required to be manually defined
 */

require_once __DIR__ . '/fw/_helper_functions.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/fw/Debug.php';
require_once __DIR__ . '/fw/BootStrap.php';
// require_once __DIR__ . '/fw/Model.php';
require_once __DIR__ . '/fw/DatabasePDO.php';
require_once __DIR__ . '/fw/Database.php';
require_once __DIR__ . '/fw/Request.php';
require_once __DIR__ . '/fw/Route.php';

use \Ascend\BootStrap as BS;

BS::init();

require_once __DIR__ . '/app/route.php';
