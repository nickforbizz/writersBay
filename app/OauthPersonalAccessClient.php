<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $client_id
 * @property string $created_at
 * @property string $updated_at
 */
class OauthPersonalAccessClient extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['client_id', 'created_at', 'updated_at'];

}
