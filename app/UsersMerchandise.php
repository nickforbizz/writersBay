<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $merchandise_id
 * @property int $cart_confirmed_id
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property CartInConfirmed $cartInConfirmed
 * @property Merchandise $merchandise
 * @property User $user
 */
class UsersMerchandise extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'users_merchandise';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'merchandise_id', 'cart_confirmed_id', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cartInConfirmed()
    {
        return $this->belongsTo('App\CartInConfirmed', 'cart_confirmed_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function merchandise()
    {
        return $this->belongsTo('App\Merchandise');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
