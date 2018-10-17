<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $business_id
 * @property string $name
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Business $business
 * @property ArrangeSectionForProductsByUser[] $arrangeSectionForProductsByUsers
 * @property CommentsProduct[] $commentsProducts
 * @property Merchandise[] $merchandises
 * @property ProductCategory[] $productCategories
 * @property ProductInAvailable[] $productInAvailables
 * @property ProductInCart[] $productInCarts
 * @property ProductInConfirmed[] $productInConfirmeds
 * @property ProductInPayment[] $productInPayments
 * @property ProductMedia[] $productMedia
 * @property ProductPricing[] $productPricings
 * @property ProductTag[] $productTags
 * @property SavedProduct[] $savedProducts
 */
class Product extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'product';

    /**
     * @var array
     */
    protected $fillable = ['business_id', 'name', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function business()
    {
        return $this->belongsTo('App\Business');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function arrangeSectionForProductsByUsers()
    {
        return $this->hasMany('App\ArrangeSectionForProductsByUser');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commentsProducts()
    {
        return $this->hasMany('App\CommentsProduct');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function merchandises()
    {
        return $this->hasMany('App\Merchandise');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productCategories()
    {
        return $this->hasMany('App\ProductCategory');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productInAvailables()
    {
        return $this->hasMany('App\ProductInAvailable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productInCarts()
    {
        return $this->hasMany('App\ProductInCart');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productInConfirmeds()
    {
        return $this->hasMany('App\ProductInConfirmed');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productInPayments()
    {
        return $this->hasMany('App\ProductInPayment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productMedia()
    {
        return $this->hasMany('App\ProductMedia');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productPricings()
    {
        return $this->hasMany('App\ProductPricing');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productTags()
    {
        return $this->hasMany('App\ProductTag');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function savedProducts()
    {
        return $this->hasMany('App\SavedProduct');
    }
}
