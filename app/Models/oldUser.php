<?php

namespace App\Models;

// use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as authenticatable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $national_id
 * @property string $email
 * @property string $password
 * @property string $username
 * @property string $fname
 * @property string $lname
 * @property string $sname
 * @property int $age
 * @property string $gender
 * @property string $email_verified_at
 * @property int $mobile
 * @property string $roles
 * @property string $address
 * @property int $remember_token
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Assignment[] $assignments
 * @property Completedassignment[] $completedassignments
 * @property Onprogressassignment[] $onprogressassignments
 * @property Onrevisionassignment[] $onrevisionassignments
 * @property Paidassignment[] $paidassignments
 * @property UserFeedback[] $userFeedbacks
 * @property UserRating[] $userRatings
 * @property UserRole[] $userRoles
 */
class User extends Authenticatable
{
    /**
     * @var array
     */
    protected $fillable = ['national_id', 'email', 'password', 'username', 'fname', 'lname', 'sname', 'age', 'gender', 'email_verified_at', 'mobile', 'roles', 'address', 'remember_token', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected $casts = [
        'roles' => 'array',
    ];

    public function assignments()
    {
        return $this->hasMany('App\Models\Assignment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function completedassignments()
    {
        return $this->hasMany('App\Models\Completedassignment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function onprogressassignments()
    {
        return $this->hasMany('App\Models\Onprogressassignment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function onrevisionassignments()
    {
        return $this->hasMany('App\Models\Onrevisionassignment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paidassignments()
    {
        return $this->hasMany('App\Models\Paidassignment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userFeedbacks()
    {
        return $this->hasMany('App\Models\UserFeedback');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userRatings()
    {
        return $this->hasMany('App\Models\UserRating');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userRoles()
    {
        return $this->hasMany('App\Models\UserRole');
    }

    // roles
        /***
     * @param string $role
     * @return $this
     */

}
