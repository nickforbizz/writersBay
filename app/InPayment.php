<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $payment_method
 * @property string $code
 * @property string $name
 * @property string $msisdn
 * @property float $amount
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property InPaymentsConfirmed[] $inPaymentsConfirmeds
 * @property InPaymentsFailed[] $inPaymentsFaileds
 * @property InPaymentsQueue[] $inPaymentsQueues
 */
class InPayment extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['payment_method', 'code', 'name', 'msisdn', 'amount', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inPaymentsConfirmeds()
    {
        return $this->hasMany('App\InPaymentsConfirmed', 'in_payments_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inPaymentsFaileds()
    {
        return $this->hasMany('App\InPaymentsFailed', 'in_payments_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inPaymentsQueues()
    {
        return $this->hasMany('App\InPaymentsQueue', 'in_payments_id');
    }
}
