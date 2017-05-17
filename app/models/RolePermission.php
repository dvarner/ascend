<?php

namespace App\Models;

use Ascend\Model;

class RolePermission extends Model
{
	// use SoftDelete;
	
    protected $table = 'rolepermissions'; // @todo figure out a way to make this roles_permissions
	
	public $timestamps = true; // true = created_at, updated_at are added to the table, also deleted_at for this framework
	// protected $dates = ['deleted_at']; // Soft Delete if exist
	protected $fillable = array('role_id', 'permission_id', 'get', 'post', 'put', 'delete');
	protected $guarded = array();
	
	protected $structure = array(
		'id'				=> 'int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY',
		'role_id' 			=> 'int unsigned NOT NULL',
		'permission_id' 	=> 'int unsigned NOT NULL',
		'get'				=> 'tinyint unsigned NOT NULL',
		'post'				=> 'tinyint unsigned NOT NULL',
		'put'				=> 'tinyint unsigned NOT NULL',
		'delete'			=> 'tinyint unsigned NOT NULL',
	);
	
	protected $seed = array(
		array('role_id' => 1, 'permission_id' => 1, 'get' => 1, 'post' => 1, 'put' => 1, 'delete' => 1),
		array('role_id' => 2, 'permission_id' => 1, 'get' => 1, 'post' => 1, 'put' => 1, 'delete' => 0),
		array('role_id' => 3, 'permission_id' => 1, 'get' => 1, 'post' => 1, 'put' => 0, 'delete' => 0),
		array('role_id' => 4, 'permission_id' => 1, 'get' => 1, 'post' => 0, 'put' => 0, 'delete' => 0),
	);
}