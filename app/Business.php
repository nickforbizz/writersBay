<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property ArrangeSectionForBusinessesByUser[] $arrangeSectionForBusinessesByUsers
 * @property BusinessesAdmin[] $businessesAdmins
 * @property BusinessesCategory[] $businessesCategories
 * @property BusinessesFlow[] $businessesFlows
 * @property BusinessesFlow[] $businessesFlows
 * @property BusinessesImage[] $businessesImages
 * @property CommentsBusiness[] $commentsBusinesses
 * @property Product[] $products
 */
class Business extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function arrangeSectionForBusinessesByUsers()
    {
        return $this->hasMany('App\ArrangeSectionForBusinessesByUser');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function businessesAdmins()
    {
        return $this->hasMany('App\BusinessesAdmin');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function businessesCategories()
    {
        return $this->hasMany('App\BusinessesCategory');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function businessesFlows()
    {
        return $this->hasMany('App\BusinessesFlow', 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function businessesFlows()
    {
        return $this->hasMany('App\BusinessesFlow', 'child_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function businessesImages()
    {
        return $this->hasMany('App\BusinessesImage');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commentsBusinesses()
    {
        return $this->hasMany('App\CommentsBusiness');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
