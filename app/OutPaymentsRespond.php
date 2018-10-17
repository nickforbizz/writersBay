<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $out_payment_id
 * @property string $link
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property OutPayment $outPayment
 * @property OutPaymentsRespondExecuted[] $outPaymentsRespondExecuteds
 * @property OutPaymentsRespondQueue[] $outPaymentsRespondQueues
 */
class OutPaymentsRespond extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'out_payments_respond';

    /**
     * @var array
     */
    protected $fillable = ['out_payment_id', 'link', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function outPayment()
    {
        return $this->belongsTo('App\OutPayment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function outPaymentsRespondExecuteds()
    {
        return $this->hasMany('App\OutPaymentsRespondExecuted', 'respond_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function outPaymentsRespondQueues()
    {
        return $this->hasMany('App\OutPaymentsRespondQueue', 'respond_id');
    }
}
