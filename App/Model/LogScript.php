<?php namespace App\Model;

use Ascend\Core\Model;
use Ascend\Core\Session;

class LogScript extends Model
{
    protected static $table = 'log_scripts';
    protected static $fields = [
        'script' => 'VARCHAR(255) NOT NULL',
        'runtime' => 'DECIMAL(10,5) UNSIGNED NOT NULL',
    ];
    protected static $start = null;

    public static function start() {
        self::$start = microtime(true);
    }

    public static function end() {
        $script = debug_backtrace()[0]['file'];
        $runtime = microtime(true) - self::$start;
        if (DEBUG) var_dump($script, $runtime);
    }

    public static function save() {
        $script = debug_backtrace()[0]['file'];
        $runtime = microtime(true) - self::$start;
        if (DEBUG) var_dump($script, $runtime);
        self::insert([
            'script' => $script,
            'runtime' => $runtime,
        ]);
    }
}
