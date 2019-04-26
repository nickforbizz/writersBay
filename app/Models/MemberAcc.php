<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $member_id
 * @property int $credit
 * @property int $debit
 * @property int $active
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Member $member
 */
class MemberAcc extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'member_acc';

    /**
     * @var array
     */
    protected $fillable = ['member_id', 'credit', 'debit', 'active', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }
}
