<?php namespace App\Model;

use Framework\Model;

// **************************************************************************************************
// **************************************************************************************************
// ** THIS MODEL MUST ALWAYS BE CALLED "SessionModel" ELSE IT CONFLICTS WITH Framework\Session
// **************************************************************************************************
// **************************************************************************************************

class SessionModel extends Model {
	protected static $table = 'sessions';
    protected static $fields = [
        'user_id' => 'INT UNSIGNED NOT NULL',
        'session_id' => 'VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL',
        'session_expires' => 'DATETIME NOT NULL',
        'session_data' => 'TEXT COLLATE utf8mb4_unicode_ci',
    ];
}
