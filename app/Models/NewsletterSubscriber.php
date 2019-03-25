<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $email
 * @property int $status
 * @property string $updated_at
 * @property string $created_at
 * @property string $deleted_at
 */
class NewsletterSubscriber extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['email', 'status', 'updated_at', 'created_at', 'deleted_at'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

}
