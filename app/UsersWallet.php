<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $type
 * @property float $value
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property WalletTransaction[] $walletTransactions
 */
class UsersWallet extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'users_wallet';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'type', 'value', 'status', 'created_at', 'updated_at'];

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
    public function walletTransactions()
    {
        return $this->hasMany('App\WalletTransaction', 'wallet_id');
    }
}
