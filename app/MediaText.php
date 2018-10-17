<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $media_id
 * @property string $text
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property Medium $medium
 */
class MediaText extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'media_text';

    /**
     * @var array
     */
    protected $fillable = ['media_id', 'text', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medium()
    {
        return $this->belongsTo('App\Medium', 'media_id');
    }
}
