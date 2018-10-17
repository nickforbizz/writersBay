<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $bill_id
 * @property string $payment_mode
 * @property string $payment_code
 * @property int $payment_amount
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property Bill $bill
 */
class BillsReceived extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'bills_received';

    /**
     * @var array
     */
    protected $fillable = ['bill_id', 'payment_mode', 'payment_code', 'payment_amount', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bill()
    {
        return $this->belongsTo('App\Bill');
    }
}
