<?php

namespace App\Model;

use Ascend\Model;

class Permission extends Model
{
    // use SoftDelete;

    protected $table = 'permissions';

    public $timestamps = true; // true = created_at, updated_at are added to the table, also deleted_at for this framework
    // protected $dates = ['deleted_at']; // Soft Delete if exist
    protected $fillable = array('name', 'detail');
    // protected $guarded = array('');

    protected $structure = array(
        'id' => 'int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'slug' => 'varchar(255) NOT NULL',
        'name' => 'varchar(255) NOT NULL',
        'detail' => 'varchar(255) NOT NULL',
    );

    protected $seed = array(
        array('slug' => 'user', 'name' => 'Allows managing of users', 'detail' => 'Allows managing of users'), // 1
    );
}