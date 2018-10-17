<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $start_date
 * @property string $end_date
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Period extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'start_date', 'end_date', 'status', 'created_at', 'updated_at'];

}
