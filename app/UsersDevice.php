<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $device_id
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property Device $device
 * @property User $user
 */
class UsersDevice extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'device_id', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function device()
    {
        return $this->belongsTo('App\Device');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
