<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $reference_code
 * @property string $platform
 * @property string $destination_type
 * @property string $destination_countryCode
 * @property string $destination_name
 * @property string $destination_cardNumber
 * @property string $destination_bankCode
 * @property string $destination_bankBic
 * @property string $destination_accountNumber
 * @property string $destination_mobileNumber
 * @property string $destination_walletName
 * @property string $payment_type
 * @property float $payment_amount
 * @property string $payment_currencyCode
 * @property string $payment_reference
 * @property string $payment_date
 * @property string $payment_description
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property OutPaymentsConfirmed[] $outPaymentsConfirmeds
 * @property OutPaymentsFailed[] $outPaymentsFaileds
 * @property OutPaymentsQueue[] $outPaymentsQueues
 * @property OutPaymentsRespond[] $outPaymentsResponds
 */
class OutPayment extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['reference_code', 'platform', 'destination_type', 'destination_countryCode', 'destination_name', 'destination_cardNumber', 'destination_bankCode', 'destination_bankBic', 'destination_accountNumber', 'destination_mobileNumber', 'destination_walletName', 'payment_type', 'payment_amount', 'payment_currencyCode', 'payment_reference', 'payment_date', 'payment_description', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function outPaymentsConfirmeds()
    {
        return $this->hasMany('App\OutPaymentsConfirmed');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function outPaymentsFaileds()
    {
        return $this->hasMany('App\OutPaymentsFailed');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function outPaymentsQueues()
    {
        return $this->hasMany('App\OutPaymentsQueue');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function outPaymentsResponds()
    {
        return $this->hasMany('App\OutPaymentsRespond');
    }
}
