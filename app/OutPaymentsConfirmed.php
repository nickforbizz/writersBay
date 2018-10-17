<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $out_payment_id
 * @property string $response
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property OutPayment $outPayment
 */
class OutPaymentsConfirmed extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'out_payments_confirmed';

    /**
     * @var array
     */
    protected $fillable = ['out_payment_id', 'response', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function outPayment()
    {
        return $this->belongsTo('App\OutPayment');
    }
}
