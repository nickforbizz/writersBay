<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $category
 * @property string $description
 * @property string $instuctions
 * @property int $pages
 * @property string $images_link
 * @property string $assignment_body
 * @property int $status
 * @property string $updated_at
 * @property string $created_at
 * @property string $deleted_at
 * @property User $user
 */
class CompletedAssignment extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'category', 'description', 'instuctions', 'pages', 'images_link', 'assignment_body', 'status', 'updated_at', 'created_at', 'deleted_at'];

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
