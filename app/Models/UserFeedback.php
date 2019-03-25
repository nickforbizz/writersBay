<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $name
 * @property string $email
 * @property string $feedback
 * @property int $status
 * @property string $updated_at
 * @property string $created_at
 * @property string $deleted_at
 */
class UserFeedback extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'user_feedback';

    /**
     * @var array
     */
    protected $fillable = ['title', 'name', 'email', 'feedback', 'status', 'updated_at', 'created_at', 'deleted_at'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

}
