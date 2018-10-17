<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $type
 * @property string $name
 * @property float $amount
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class SystemWalletConfig extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['type', 'name', 'amount', 'status', 'created_at', 'updated_at'];

}
