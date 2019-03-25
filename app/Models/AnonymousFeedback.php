<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $feedback
 * @property int $status
 * @property string $updated_at
 * @property string $created_at
 * @property string $deleted_at
 * @property User $user
 */
class AnonymousFeedback extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'anonymous_feedback';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'feedback', 'status', 'updated_at', 'created_at', 'deleted_at'];

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
}
