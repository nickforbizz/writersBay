<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $chama_id
 * @property int $credit
 * @property int $debit
 * @property int $active
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Chama $chama
 */
class ChamaAcc extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'chama_acc';

    /**
     * @var array
     */
    protected $fillable = ['chama_id', 'credit', 'debit', 'active', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function chama()
    {
        return $this->belongsTo('App\Models\Chama');
    }
}
