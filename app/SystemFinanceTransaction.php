<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $system_finance
 * @property int $transaction_id
 * @property string $remarks
 * @property float $sys_value_change_from
 * @property float $sys_value_change_to
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property SystemFinance $systemFinance
 * @property Transaction $transaction
 */
class SystemFinanceTransaction extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['system_finance', 'transaction_id', 'remarks', 'sys_value_change_from', 'sys_value_change_to', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function systemFinance()
    {
        return $this->belongsTo('App\SystemFinance', 'system_finance');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction()
    {
        return $this->belongsTo('App\Transaction');
    }
}
