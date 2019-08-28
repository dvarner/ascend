<?php namespace App\Model;

use Ascend\Core\Model;

class Migration extends Model
{
    protected static $table = 'migrations';
    protected static $fields = [
        'batch_id' => 'INT UNSIGNED NOT NULL',
        'model' => 'VARCHAR(255) NOT NULL',
        'structure' => 'TEXT NOT NULL', // stores json but json not available on this mysql version yet
        'is_rollback' => 'TINYINT UNSIGNED NOT NULL',
        'batch_id_rollback' => 'INT UNSIGNED NOT NULL',
    ];

    public static function getLastBatchId()
    {
        $sql = "SELECT batch_id FROM ". self::getTableName() ." ORDER BY batch_id DESC LIMIT 1";
        $row = self::one($sql, []);
        return isset($row['batch_id']) ? $row['batch_id'] : 0;
    }

    public static function getNextBatchId()
    {
        return self::getLastBatchId() + 1;
    }

    public static function getByBatchID($batch_id)
    {
        $sql = "SELECT * FROM ". self::getTableName() ." WHERE batch_id = :batch_id";
        return self::many($sql, ['batch_id' => $batch_id]);
    }

    public static function getByModelAndBatchID($batch_id, $model)
    {
        // this might need to be "batch_id <= :batch_id" so change back if issues come up
        $sql = "SELECT * FROM ". self::getTableName() ." WHERE batch_id <= :batch_id AND model = :model ORDER BY batch_id DESC LIMIT 1";
        return self::one($sql, ['batch_id' => $batch_id, 'model' => $model]);
    }
}
