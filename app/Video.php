<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string $dimension
 * @property int $size
 * @property string $link
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property MediaVideo[] $mediaVideos
 */
class Video extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'type', 'dimension', 'size', 'link', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mediaVideos()
    {
        return $this->hasMany('App\MediaVideo', 'videos_id');
    }
}
