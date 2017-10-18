<?php

namespace App\Model;

use Ascend\Model;

class RolePermission extends Model
{
    protected $table = 'roles_permissions';
    protected $fillable = ['role_id', 'permission_id', 'method_get', 'method_post', 'method_put', 'method_delete'];

    protected $structure = [
        'id' => 'int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'role_id' => 'int unsigned NOT NULL',
        'permission_id' => 'int unsigned NOT NULL',
        'method_get' => 'tinyint unsigned NOT NULL',
        'method_post' => 'tinyint unsigned NOT NULL',
        'method_put' => 'tinyint unsigned NOT NULL',
        'method_delete' => 'tinyint unsigned NOT NULL',
    ];
}