<?php

namespace App\Models;

use Ascend\Model;

class User extends Model
{
	// use SoftDelete;
	
    protected $table = 'users';
	
	public $timestamps = true; // true = created_at, updated_at are added to the table, also deleted_at for this framework
	// protected $dates = ['deleted_at']; // Soft Delete if exist
	protected $fillable = array('role_id', 'username', 'confirm');
	protected $guarded = array('password');
	
	protected $structure = array(
		'id'		=> 'int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY',
		'role_id'	=> 'int unsigned NOT NULL',
		'username' 	=> 'varchar(255) NOT NULL',
		'password' 	=> 'varchar(255) NOT NULL',
		'confirm'	=> 'varchar(255) NOT NULL',
	);
}