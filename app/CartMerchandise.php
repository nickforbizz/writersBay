<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $cart_id
 * @property int $merchandise_id
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Cart $cart
 * @property Merchandise $merchandise
 */
class CartMerchandise extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cart_merchandise';

    /**
     * @var array
     */
    protected $fillable = ['cart_id', 'merchandise_id', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function merchandise()
    {
        return $this->belongsTo('App\Merchandise');
    }
}
