<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $access_token_id
 * @property boolean $revoked
 * @property string $expires_at
 */
class OauthRefreshToken extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['access_token_id', 'revoked', 'expires_at'];

}
