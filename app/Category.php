<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property BusinessesCategory[] $businessesCategories
 * @property CategoryFlow[] $categoryFlows
 * @property CategoryFlow[] $categoryFlows
 * @property ProductCategory[] $productCategories
 */
class Category extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'category';

    /**
     * @var array
     */
    protected $fillable = ['name', 'status', 'created_at', 'updated_at'];

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
    public function categoryFlows()
    {
        return $this->hasMany('App\CategoryFlow', 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categoryFlows()
    {
        return $this->hasMany('App\CategoryFlow', 'child_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productCategories()
    {
        return $this->hasMany('App\ProductCategory');
    }
}
