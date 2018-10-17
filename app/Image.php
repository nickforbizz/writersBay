<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $type
 * @property int $size
 * @property string $link
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property BusinessesImage[] $businessesImages
 * @property MediaGallery[] $mediaGalleries
 */
class Image extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'type', 'size', 'link', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function businessesImages()
    {
        return $this->hasMany('App\BusinessesImage');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mediaGalleries()
    {
        return $this->hasMany('App\MediaGallery', 'images_id');
    }
}
