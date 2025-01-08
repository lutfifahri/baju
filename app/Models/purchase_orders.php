<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class purchase_orders extends Model
{
    protected $table = 'purchase_orders';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    /**
     * Get the user that owns the purchase_orders
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(suppliers::class, 'supplier_id', 'id');
    }
}
