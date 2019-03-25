<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $assignment_id
 * @property int $user_id
 * @property string $reason
 * @property int $status
 * @property string $updated_at
 * @property string $created_at
 * @property string $deleted_at
 * @property User $user
 * @property Assignment $assignment
 */
class OnrevisionAssignment extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['assignment_id', 'user_id', 'reason', 'status', 'updated_at', 'created_at', 'deleted_at'];

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assignment()
    {
        return $this->belongsTo('App\Models\Assignment');
    }
}
