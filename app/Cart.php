<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property User $user
 * @property CartInBill[] $cartInBills
 * @property CartInConfirmed[] $cartInConfirmeds
 * @property CartInFailed[] $cartInFaileds
 * @property CartInQueue[] $cartInQueues
 * @property CartMerchandise[] $cartMerchandises
 */
class Cart extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cart';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'name', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartInBills()
    {
        return $this->hasMany('App\CartInBill');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartInConfirmeds()
    {
        return $this->hasMany('App\CartInConfirmed');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartInFaileds()
    {
        return $this->hasMany('App\CartInFailed');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartInQueues()
    {
        return $this->hasMany('App\CartInQueue');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartMerchandises()
    {
        return $this->hasMany('App\CartMerchandise');
    }
}
