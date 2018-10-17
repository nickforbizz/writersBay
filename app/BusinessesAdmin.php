<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $business_id
 * @property int $user_id
 * @property string $name
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Business $business
 * @property User $user
 */
class BusinessesAdmin extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'businesses_admin';

    /**
     * @var array
     */
    protected $fillable = ['business_id', 'user_id', 'name', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function business()
    {
        return $this->belongsTo('App\Business');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
