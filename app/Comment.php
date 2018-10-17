<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $media_id
 * @property int $user_id
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Medium $medium
 * @property User $user
 * @property CommentsBusiness[] $commentsBusinesses
 * @property CommentsProduct[] $commentsProducts
 */
class Comment extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['media_id', 'user_id', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medium()
    {
        return $this->belongsTo('App\Medium', 'media_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commentsBusinesses()
    {
        return $this->hasMany('App\CommentsBusiness');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commentsProducts()
    {
        return $this->hasMany('App\CommentsProduct');
    }
}
