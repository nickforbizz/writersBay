<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $out_payment_id
 * @property string $transfer_time
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property OutPayment $outPayment
 */
class OutPaymentsQueue extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'out_payments_queue';

    /**
     * @var array
     */
    protected $fillable = ['out_payment_id', 'transfer_time', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function outPayment()
    {
        return $this->belongsTo('App\OutPayment');
    }
}
