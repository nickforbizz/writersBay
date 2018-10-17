<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $files_id
 * @property int $media_id
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property File $file
 * @property Medium $medium
 */
class MediaFile extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['files_id', 'media_id', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function file()
    {
        return $this->belongsTo('App\File', 'files_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medium()
    {
        return $this->belongsTo('App\Medium', 'media_id');
    }
}
