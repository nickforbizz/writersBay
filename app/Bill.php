<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $reference_code
 * @property float $amount
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property BillsConfirmed $billsConfirmed
 * @property BillsReceived[] $billsReceiveds
 * @property BillsWaiting $billsWaiting
 * @property CartInBill[] $cartInBills
 */
class Bill extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'code', 'reference_code', 'amount', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function billsConfirmed()
    {
        return $this->hasOne('App\BillsConfirmed', 'bill_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function billsReceiveds()
    {
        return $this->hasMany('App\BillsReceived');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function billsWaiting()
    {
        return $this->hasOne('App\BillsWaiting', 'bill_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartInBills()
    {
        return $this->hasMany('App\CartInBill');
    }
}
