<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $wallet_id
 * @property int $transaction_id
 * @property string $tag
 * @property float $amount
 * @property float $value_change_from
 * @property float $value_change_to
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property Transaction $transaction
 * @property Wallet $wallet
 */
class WalletTransaction extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['wallet_id', 'transaction_id', 'tag', 'amount', 'value_change_from', 'value_change_to', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction()
    {
        return $this->belongsTo('App\Transaction');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function wallet()
    {
        return $this->belongsTo('App\Wallet');
    }
}
