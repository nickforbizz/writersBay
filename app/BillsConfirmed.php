<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $bill_id
 * @property string $confirmation_code
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property Bill $bill
 * @property CartInConfirmed[] $cartInConfirmeds
 */
class BillsConfirmed extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'bills_confirmed';

    /**
     * @var array
     */
    protected $fillable = ['bill_id', 'confirmation_code', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bill()
    {
        return $this->belongsTo('App\Bill');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartInConfirmeds()
    {
        return $this->hasMany('App\CartInConfirmed', 'bill_confirmed_id');
    }
}
