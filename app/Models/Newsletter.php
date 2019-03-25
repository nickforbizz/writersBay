<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $posted_by
 * @property string $category
 * @property string $title
 * @property string $body
 * @property int $status
 * @property string $updated_at
 * @property string $created_at
 * @property string $deleted_at
 * @property User $user
 */
class Newsletter extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'newsletter';

    /**
     * @var array
     */
    protected $fillable = ['posted_by', 'category', 'title', 'body', 'status', 'updated_at', 'created_at', 'deleted_at'];

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
        return $this->belongsTo('App\Models\User', 'posted_by');
    }
}
