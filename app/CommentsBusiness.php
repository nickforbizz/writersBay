<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $comment_id
 * @property int $business_id
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Comment $comment
 * @property Business $business
 */
class CommentsBusiness extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'comments_business';

    /**
     * @var array
     */
    protected $fillable = ['comment_id', 'business_id', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function business()
    {
        return $this->belongsTo('App\Business');
    }
}
