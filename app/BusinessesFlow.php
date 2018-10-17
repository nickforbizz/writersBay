<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $parent_id
 * @property int $child_id
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Business $business
 * @property Business $business
 */
class BusinessesFlow extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'businesses_flow';

    /**
     * @var array
     */
    protected $fillable = ['parent_id', 'child_id', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function business()
    {
        return $this->belongsTo('App\Business', 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function business()
    {
        return $this->belongsTo('App\Business', 'child_id');
    }
}
