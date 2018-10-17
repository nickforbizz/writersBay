<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $videos_id
 * @property int $media_id
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property Medium $medium
 * @property Video $video
 */
class MediaVideo extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['videos_id', 'media_id', 'status', 'created_at', 'updated_at'];

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
    public function video()
    {
        return $this->belongsTo('App\Video', 'videos_id');
    }
}
