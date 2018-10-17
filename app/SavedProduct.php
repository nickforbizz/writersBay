<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $product_id
 * @property int $user_id
 * @property string $name
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property User $user
 * @property Product $product
 */
class SavedProduct extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'saved_product';

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'user_id', 'name', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
