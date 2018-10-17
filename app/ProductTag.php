<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $product_id
 * @property string $key
 * @property string $value
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Product $product
 * @property ProductPricing[] $productPricings
 */
class ProductTag extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['product_id', 'key', 'value', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productPricings()
    {
        return $this->hasMany('App\ProductPricing');
    }
}
