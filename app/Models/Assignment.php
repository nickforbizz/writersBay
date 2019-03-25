<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $category
 * @property string $description
 * @property string $instuctions
 * @property int $pages
 * @property int $posted_by
 * @property string $images_link
 * @property string $deadline
 * @property int $status
 * @property string $updated_at
 * @property string $created_at
 * @property string $deleted_at
 * @property OnrevisionAssignment[] $onrevisionAssignments
 * @property PaidAssignment[] $paidAssignments
 * @property UserRating[] $userRatings
 */
class Assignment extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'category', 'description', 'instuctions', 'pages', 'posted_by', 'images_link', 'deadline', 'status', 'updated_at', 'created_at', 'deleted_at'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function onrevisionAssignments()
    {
        return $this->hasMany('App\Models\OnrevisionAssignment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paidAssignments()
    {
        return $this->hasMany('App\Models\PaidAssignment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userRatings()
    {
        return $this->hasMany('App\Models\UserRating');
    }
}
