<?php

namespace App\Model;

use Ascend\Core\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['name', 'detail', 'is_active'];

    protected $structure = [
        'id' => 'int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'name' => 'varchar(255) NOT NULL',
        'detail' => 'varchar(255) NOT NULL',
        'is_active' => 'tinyint unsigned NOT NULL',
    ];

    protected $seed = [
        ['name' => 'Admin', 'detail' => '', 'is_active' => 1], // 1
        ['name' => 'Moderator', 'detail' => '', 'is_active' => 1], // 2
        ['name' => 'Member', 'detail' => '', 'is_active' => 1], // 3
    ];
}