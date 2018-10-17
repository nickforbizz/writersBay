<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $in_payments_id
 * @property string $response
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property InPayment $inPayment
 */
class InPaymentsConfirmed extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'in_payments_confirmed';

    /**
     * @var array
     */
    protected $fillable = ['in_payments_id', 'response', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inPayment()
    {
        return $this->belongsTo('App\InPayment', 'in_payments_id');
    }
}
