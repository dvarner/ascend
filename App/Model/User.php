<?php

namespace App\Model;

use Ascend\Core\Bootstrap;
use Ascend\Core\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['role_id',
        'email', 'username', 'firstname', 'lastname', 'password',
        'confirm', 'timezone', 'language', 'country', 'is_active'];

    protected $structure = [
        'id' => 'int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'role_id' => 'int unsigned NOT NULL',
        'email' => 'varchar(255) NOT NULL',
        'username' => 'varchar(255) NOT NULL',
        'firstname' => 'varchar(255) NOT NULL',
        'lastname' => 'varchar(255) NOT NULL',
        'password' => 'varchar(255) NOT NULL',
        'confirm' => 'varchar(255) NOT NULL',
        'timezone' => 'varchar(50) NOT NULL',
        'language' => 'varchar(10) NOT NULL',
        'country' => 'varchar(2) NOT NULL',
        'is_active' => 'tinyint unsigned not null',
    ];

    protected $validation = [
        'id' => 'int',
        'role_id' => 'int',
        'email' => 'email',
        'username' => 'username',
        'password' => 'password',
        'firstname' => 'string',
        'lastname' => 'string',
        'confirm' => 'string',
        'timezone' => 'string',
        'language' => 'string',
        'country' => 'string',
        'is_active' => 'int',
    ];

    public static function isActive() {
        $table = self::getTableName();
        $db = Bootstrap::getDBPDO();

        $sql = "SELECT * FROM {$table} WHERE is_active = :is_active";
        $db->query($sql);
        $db->bind(':is_active', 1);
        $row = $db->resultset();

        return $row;
    }

    public static function getById($id) {
        $table = self::getTableName();

        if (is_null($id)) {
            die('<a href="/">You have been logged out, click here to go to login page"</a>');
        }

        $sql = "SELECT * FROM {$table}";
        $sql.= " WHERE ";
        $sql.= "id = {$id}";
        $db = Bootstrap::getDBPDO();
        $db->query($sql);
        $db->execute();
        $row = $db->resultset(false);
        $row = isset($row[0]) ? $row[0] : null;

        return $row;
    }

    public static function getAdmins() {
        $table = self::getTableName();

        $sql = "SELECT * FROM {$table}";
        $sql.= " WHERE ";
        $sql.= "deleted_at IS NULL";
        $sql.= " AND role_id = 1";
        $sql.= " ORDER BY lastname, firstname";

        $db = Bootstrap::getDBPDO();
        $db->query($sql);
        $db->execute();
        return $db->resultset();
    }

    public static function getModerators() {
        $table = self::getTableName();

        $sql = "SELECT * FROM {$table}";
        $sql.= " WHERE ";
        $sql.= "deleted_at IS NULL";
        $sql.= " AND role_id = 2";
        $sql.= " ORDER BY lastname, firstname";

        $db = Bootstrap::getDBPDO();
        $db->query($sql);
        $db->execute();
        return $db->resultset();
    }

    public static function getMembers() {
        $table = self::getTableName();

        $sql = "SELECT * FROM {$table}";
        $sql.= " WHERE ";
        $sql.= "deleted_at IS NULL";
        $sql.= " AND role_id = 3";
        $sql.= " ORDER BY lastname, firstname";

        $db = Bootstrap::getDBPDO();
        $db->query($sql);
        $db->execute();
        return $db->resultset();
    }
}