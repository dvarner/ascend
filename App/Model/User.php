<?php

namespace App\Model;

use Ascend\Model;

class User extends Model
{
    // use SoftDelete;

    protected $table = 'users';

    public $timestamps = true; // true = created_at, updated_at are added to the table, also deleted_at for this framework
    // protected $dates = ['deleted_at']; // Soft Delete if exist
    protected $fillable = array('role_id', 'email', 'firstname', 'lastname',
        'confirm', 'timezone', 'language', 'country', 'is_active');
    protected $guarded = array('password');

    protected $structure = array(
        'id' => 'int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'role_id' => 'int unsigned NOT NULL',
        'email' => 'varchar(255) NOT NULL',
        // 'username' => 'varchar(255) NOT NULL',
        'firstname' => 'varchar(255) NOT NULL',
        'lastname' => 'varchar(255) NOT NULL',
        'password' => 'varchar(255) NOT NULL',
        'confirm' => 'varchar(255) NOT NULL',
        'timezone' => 'varchar(50) NOT NULL',
        'language' => 'varchar(10) NOT NULL',
        'country' => 'varchar(2) NOT NULL',
        'is_active' => 'tinyint unsigned not null',
    );

    protected $validation = array(
        'id' => array('int'),
        'role_id' => array('int'),
        'email' => array('email'),
        // 'username' => array('username'),
        'password' => array('password'),
        'firstname' => array('string'),
        'lastname' => array('string'),
        'confirm' => array('string'),
        'timezone' => array('string'),
        'language' => array('string'),
        'country' => array('string'),
        'tinyint' => ['int'],
    );
}