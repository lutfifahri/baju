<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class purchase_order_items extends Model
{
    protected $table = 'purchase_order_items';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    /**
     * Get the user that owns the purchase_order_items
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function purchase_order(): BelongsTo
    {
        return $this->belongsTo(purchase_orders::class, 'purchase_order_id', 'id');
    }
    /**
     * Get the user that owns the purchase_order_items
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }
}
