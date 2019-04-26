<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $mission
 * @property string $vision
 * @property string $goals
 * @property int $active
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property ChamaAcc[] $chamaAccs
 * @property User[] $users
 */
class Chama extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'chama';

    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'mission', 'vision', 'goals', 'active', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chamaAccs()
    {
        return $this->hasMany('App\Models\ChamaAcc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
