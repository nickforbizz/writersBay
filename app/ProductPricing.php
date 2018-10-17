<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $product_id
 * @property int $product_tag_id
 * @property string $key
 * @property string $value
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property ProductTag $productTag
 * @property Product $product
 */
class ProductPricing extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'product_pricing';

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'product_tag_id', 'key', 'value', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productTag()
    {
        return $this->belongsTo('App\ProductTag');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
