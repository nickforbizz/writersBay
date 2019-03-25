<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $national_id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $fname
 * @property string $lname
 * @property string $sname
 * @property string $gender
 * @property int $age
 * @property int $mobile
 * @property string $address
 * @property string $user_level
 * @property string $remember_token
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property AnonymousFeedback[] $anonymousFeedbacks
 * @property CompletedAssignment[] $completedAssignments
 * @property Newsletter[] $newsletters
 * @property OnprogressAssignment[] $onprogressAssignments
 * @property OnrevisionAssignment[] $onrevisionAssignments
 * @property PaidAssignment[] $paidAssignments
 * @property ReassignedAssignment[] $reassignedAssignments
 * @property UserRating[] $userRatings
 */
class User extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['national_id', 'username', 'email', 'password', 'fname', 'lname', 'sname', 'gender', 'age', 'mobile', 'address', 'user_level', 'remember_token', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function anonymousFeedbacks()
    {
        return $this->hasMany('App\Models\AnonymousFeedback');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function completedAssignments()
    {
        return $this->hasMany('App\Models\CompletedAssignment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function newsletters()
    {
        return $this->hasMany('App\Models\Newsletter', 'posted_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function onprogressAssignments()
    {
        return $this->hasMany('App\Models\OnprogressAssignment');
    }

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
    public function reassignedAssignments()
    {
        return $this->hasMany('App\Models\ReassignedAssignment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userRatings()
    {
        return $this->hasMany('App\Models\UserRating');
    }
}
