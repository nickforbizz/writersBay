<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $cart_id
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Cart $cart
 */
class CartInQueue extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cart_in_queue';

    /**
     * @var array
     */
    protected $fillable = ['cart_id', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }
}
