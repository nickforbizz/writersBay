<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $respond_id
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property OutPaymentsRespond $outPaymentsRespond
 */
class OutPaymentsRespondQueue extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'out_payments_respond_queue';

    /**
     * @var array
     */
    protected $fillable = ['respond_id', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function outPaymentsRespond()
    {
        return $this->belongsTo('App\OutPaymentsRespond', 'respond_id');
    }
}
