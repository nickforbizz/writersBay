<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property Comment[] $comments
 * @property MediaFile[] $mediaFiles
 * @property MediaGallery[] $mediaGalleries
 * @property MediaText[] $mediaTexts
 * @property MediaVideo[] $mediaVideos
 * @property ProductMedia[] $productMedia
 */
class Medium extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment', 'media_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mediaFiles()
    {
        return $this->hasMany('App\MediaFile', 'media_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mediaGalleries()
    {
        return $this->hasMany('App\MediaGallery', 'media_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mediaTexts()
    {
        return $this->hasMany('App\MediaText', 'media_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mediaVideos()
    {
        return $this->hasMany('App\MediaVideo', 'media_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productMedia()
    {
        return $this->hasMany('App\ProductMedia', 'media_id');
    }
}
