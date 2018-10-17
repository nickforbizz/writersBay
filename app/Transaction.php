<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $tag
 * @property string $type
 * @property float $amount
 * @property string $initiator
 * @property string $receipient
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property SystemFinanceTransaction[] $systemFinanceTransactions
 * @property WalletTransaction[] $walletTransactions
 */
class Transaction extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['tag', 'type', 'amount', 'initiator', 'receipient', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function systemFinanceTransactions()
    {
        return $this->hasMany('App\SystemFinanceTransaction');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function walletTransactions()
    {
        return $this->hasMany('App\WalletTransaction');
    }
}
