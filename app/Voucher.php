<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $type
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Merchandise[] $merchandises
 * @property VouchersPricing[] $vouchersPricings
 */
class Voucher extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['type', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function merchandises()
    {
        return $this->hasMany('App\Merchandise');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vouchersPricings()
    {
        return $this->hasMany('App\VouchersPricing');
    }
}
