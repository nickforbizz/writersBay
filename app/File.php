<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property MediaFile[] $mediaFiles
 */
class File extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mediaFiles()
    {
        return $this->hasMany('App\MediaFile', 'files_id');
    }
}
