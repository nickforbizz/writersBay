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
 * @property SystemFinanceTransaction[] $systemFinanceTransactions
 */
class SystemFinance extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'system_finance';

    /**
     * @var array
     */
    protected $fillable = ['type', 'name', 'amount', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function systemFinanceTransactions()
    {
        return $this->hasMany('App\SystemFinanceTransaction', 'system_finance');
    }
}
