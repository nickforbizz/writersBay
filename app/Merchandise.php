<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $product_id
 * @property int $voucher_id
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Product $product
 * @property Voucher $voucher
 * @property CartMerchandise[] $cartMerchandises
 * @property UsersMerchandise[] $usersMerchandises
 */
class Merchandise extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'merchandise';

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'voucher_id', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function voucher()
    {
        return $this->belongsTo('App\Voucher');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartMerchandises()
    {
        return $this->hasMany('App\CartMerchandise');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usersMerchandises()
    {
        return $this->hasMany('App\UsersMerchandise');
    }
}
