<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $arrange_view_id
 * @property string $name
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property ArrangeView $arrangeView
 * @property ArrangeSectionForBusinessesByUser[] $arrangeSectionForBusinessesByUsers
 * @property ArrangeSectionForProductsByUser[] $arrangeSectionForProductsByUsers
 */
class ArrangeSection extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['arrange_view_id', 'name', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function arrangeView()
    {
        return $this->belongsTo('App\ArrangeView');
    }

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
    public function arrangeSectionForProductsByUsers()
    {
        return $this->hasMany('App\ArrangeSectionForProductsByUser');
    }
}
