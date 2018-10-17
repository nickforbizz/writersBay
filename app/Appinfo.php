<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $type
 * @property string $image
 * @property string $data
 * @property string $page
 * @property string $status
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 */
class Appinfo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'appinfo';

    /**
     * @var array
     */
    protected $fillable = ['title', 'type', 'image', 'data', 'page', 'status', 'remember_token', 'created_at', 'updated_at'];

}
