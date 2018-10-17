<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $secret
 * @property string $redirect
 * @property boolean $personal_access_client
 * @property boolean $password_client
 * @property boolean $revoked
 * @property string $created_at
 * @property string $updated_at
 */
class OauthClient extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'name', 'secret', 'redirect', 'personal_access_client', 'password_client', 'revoked', 'created_at', 'updated_at'];

}
