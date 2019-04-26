<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $member_id
 * @property int $category_id
 * @property int $amount
 * @property string $description
 * @property int $paid
 * @property int $active
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property WithdrawCategory $withdrawCategory
 * @property Member $member
 * @property LoanWithdrawal[] $loanWithdrawals
 * @property PayoutWithdrawal[] $payoutWithdrawals
 */
class Withdrawal extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['member_id', 'category_id', 'amount', 'description', 'paid', 'active', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function withdrawCategory()
    {
        return $this->belongsTo('App\Models\WithdrawCategory', 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loanWithdrawals()
    {
        return $this->hasMany('App\Models\LoanWithdrawal');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payoutWithdrawals()
    {
        return $this->hasMany('App\Models\PayoutWithdrawal');
    }
}
