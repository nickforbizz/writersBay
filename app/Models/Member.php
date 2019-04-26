<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $member_level
 * @property int $active
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property User $user
 * @property Contribution[] $contributions
 * @property LoanRequested[] $loanRequesteds
 * @property MemberAcc[] $memberAccs
 * @property Notification[] $notifications
 * @property Penalty[] $penalties
 * @property Suggestion[] $suggestions
 * @property Withdrawal[] $withdrawals
 */
class Member extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'member_level', 'active', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contributions()
    {
        return $this->hasMany('App\Models\Contribution');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loanRequesteds()
    {
        return $this->hasMany('App\Models\LoanRequested');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function memberAccs()
    {
        return $this->hasMany('App\Models\MemberAcc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penalties()
    {
        return $this->hasMany('App\Models\Penalty');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function suggestions()
    {
        return $this->hasMany('App\Models\Suggestion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function withdrawals()
    {
        return $this->hasMany('App\Models\Withdrawal');
    }
}
