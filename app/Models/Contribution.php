<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $member_id
 * @property int $category_id
 * @property int $amount
 * @property string $date_due
 * @property string $description
 * @property int $active
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property ContributionCategory $contributionCategory
 * @property Member $member
 * @property MiscalleneousContribution[] $miscalleneousContributions
 * @property NormalContribution[] $normalContributions
 * @property SavingsContribution[] $savingsContributions
 */
class Contribution extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'contribution';

    /**
     * @var array
     */
    protected $fillable = ['member_id', 'category_id', 'amount', 'date_due', 'description', 'active', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contributionCategory()
    {
        return $this->belongsTo('App\Models\ContributionCategory', 'category_id');
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
    public function miscalleneousContributions()
    {
        return $this->hasMany('App\Models\MiscalleneousContribution');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function normalContributions()
    {
        return $this->hasMany('App\Models\NormalContribution');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function savingsContributions()
    {
        return $this->hasMany('App\Models\SavingsContribution');
    }
}
