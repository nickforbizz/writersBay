<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $images_id
 * @property int $media_id
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property Image $image
 * @property Medium $medium
 */
class MediaGallery extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'media_gallery';

    /**
     * @var array
     */
    protected $fillable = ['images_id', 'media_id', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function image()
    {
        return $this->belongsTo('App\Image', 'images_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medium()
    {
        return $this->belongsTo('App\Medium', 'media_id');
    }
}
