<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $cart_id
 * @property int $bill_confirmed_id
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property BillsConfirmed $billsConfirmed
 * @property Cart $cart
 * @property UsersMerchandise[] $usersMerchandises
 */
class CartInConfirmed extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cart_in_confirmed';

    /**
     * @var array
     */
    protected $fillable = ['cart_id', 'bill_confirmed_id', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function billsConfirmed()
    {
        return $this->belongsTo('App\BillsConfirmed', 'bill_confirmed_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usersMerchandises()
    {
        return $this->hasMany('App\UsersMerchandise', 'cart_confirmed_id');
    }
}
