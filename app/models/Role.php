<?php

namespace App\Model;

use Ascend\Model;

class Role extends Model
{
    // use SoftDelete;

    protected $table = 'roles';

    public $timestamps = true; // true = created_at, updated_at are added to the table, also deleted_at for this framework
    // protected $dates = ['deleted_at']; // Soft Delete if exist
    protected $fillable = array('name', 'detail', 'is_active');
    protected $guarded = array('');

    protected $structure = array(
        'id' => 'int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'name' => 'varchar(255) NOT NULL',
        'detail' => 'varchar(255) NOT NULL',
        'is_active' => 'tinyint unsigned NOT NULL',
    );

    protected $seed = array(
        array('name' => 'Admin', 'detail' => '', 'is_active' => 1), // 1
        array('name' => 'Mod', 'detail' => '', 'is_active' => 1), // 2
        array('name' => 'Member', 'detail' => '', 'is_active' => 1), // 3
        array('name' => 'Guest', 'detail' => '', 'is_active' => 1), // 4
        // array('name' => 'Ban: Temp', 'detail' => '', 'is_active' => 1), // 5
        // array('name' => 'Ban: Perm', 'detail' => '', 'is_active' => 1), // 6
    );
}