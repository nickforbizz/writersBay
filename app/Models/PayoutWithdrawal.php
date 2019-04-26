<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $withdrawal_id
 * @property int $active
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Withdrawal $withdrawal
 */
class PayoutWithdrawal extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['withdrawal_id', 'active', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function withdrawal()
    {
        return $this->belongsTo('App\Models\Withdrawal');
    }
}
