<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as authenticatable;

/**
 * @property int $id
 * @property int $chama_id
 * @property int $national_id
 * @property int $phone_number
 * @property int $email
 * @property string $username
 * @property string $gender
 * @property string $password
 * @property string $fname
 * @property string $sname
 * @property string $lname
 * @property int $active
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Chama $chama
 * @property Member[] $members
 */
class User extends authenticatable
{
    /**
     * @var array
     */
    protected $fillable = ['chama_id', 'national_id', 'phone_number', 'email', 'username', 'gender', 'password', 'fname', 'sname', 'lname', 'active', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function chama()
    {
        return $this->belongsTo('App\Models\Chama');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function members()
    {
        return $this->hasMany('App\Models\Member');
    }
}
