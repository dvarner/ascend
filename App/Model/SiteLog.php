<?php namespace App\Model;

use Ascend\Core\Model;
use Ascend\Core\Session;

class SiteLog extends Model
{
    protected static $table = 'site_logs';
    protected static $fields = [
        'user_id' => 'INT UNSIGNED DEFAULT NULL',
        'uri' => 'VARCHAR(255) NOT NULL',
        'ip' => 'VARCHAR(20) NOT NULL',
        'referer' => 'TEXT NOT NULL',
    ];

    public static function insertUri() {
        $userId     = Session::exists('user.id') ? Session::get('user.id') : 0;
        $uri	    = (isset($_SERVER['REQUEST_URI']) && $_SERVER["REQUEST_URI"] != ''?$_SERVER["REQUEST_URI"]:__FILE__);
        $ip			= (isset($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:'local');
        $referer	= (isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'');
        self::insert([
            'user_id' => $userId,
            'uri' => $uri,
            'ip' => $ip,
            'referer' => $referer,
        ]);
    }

    public static function top10UriViewStats() {
        $table = self::getTableName();

        $sql = "
        SELECT count(id) as views, uri
        FROM {$table}
        WHERE deleted_at IS NULL
        GROUP BY uri
        ORDER BY views DESC
        LIMIT 10
        ";
        return self::many($sql);
    }
}