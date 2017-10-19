<?php

namespace App\Model;

use Ascend\Core\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $fillable = ['slug', 'name', 'detail'];

    protected $structure = [
        'id' => 'int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'slug' => 'varchar(255) NOT NULL',
        'name' => 'varchar(255) NOT NULL',
        'detail' => 'varchar(255) NOT NULL',
    ];

    protected $seed = [
        ['slug' => 'user', 'name' => 'Allows managing of users', 'detail' => 'Allows managing of users'], // 1
        ['slug' => 'role', 'name' => '', 'detail' => 'Admin Role'], // 1
        ['slug' => 'admin', 'name' => '', 'detail' => 'Admin Area'],
        ['slug' => 'reports', 'name' => '', 'detail' => 'Reports Area'],
        ['slug' => 'permission', 'name' => '', 'detail' => 'Admin Permissions'],
    ];
}