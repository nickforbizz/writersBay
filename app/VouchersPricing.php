<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $voucher_id
 * @property string $key
 * @property string $value
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Voucher $voucher
 */
class VouchersPricing extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'vouchers_pricing';

    /**
     * @var array
     */
    protected $fillable = ['voucher_id', 'key', 'value', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function voucher()
    {
        return $this->belongsTo('App\Voucher');
    }
}
