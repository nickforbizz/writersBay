<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property UsersDevice[] $usersDevices
 * @property UsersLoginActivity[] $usersLoginActivities
 */
class Device extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usersDevices()
    {
        return $this->hasMany('App\UsersDevice');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usersLoginActivities()
    {
        return $this->hasMany('App\UsersLoginActivity');
    }
}
