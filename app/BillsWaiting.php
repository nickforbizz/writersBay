<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $bill_id
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property Bill $bill
 */
class BillsWaiting extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'bills_waiting';

    /**
     * @var array
     */
    protected $fillable = ['bill_id', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bill()
    {
        return $this->belongsTo('App\Bill');
    }
}
