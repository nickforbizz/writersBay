<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $member_id
 * @property int $category_id
 * @property string $date_due
 * @property string $description
 * @property int $active
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property PenaltyCategory $penaltyCategory
 * @property Member $member
 */
class Penalty extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['member_id', 'category_id', 'date_due', 'description', 'active', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function penaltyCategory()
    {
        return $this->belongsTo('App\Models\PenaltyCategory', 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }
}
