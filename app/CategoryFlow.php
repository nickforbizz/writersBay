<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $parent_id
 * @property int $child_id
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property Category $category
 * @property Category $category
 */
class CategoryFlow extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'category_flow';

    /**
     * @var array
     */
    protected $fillable = ['parent_id', 'child_id', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category', 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category', 'child_id');
    }
}
