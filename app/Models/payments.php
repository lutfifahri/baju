<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class payments extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function orders(): BelongsTo
    {
        return $this->belongsTo(Orders::class, 'order_id', 'id');
    }
}
