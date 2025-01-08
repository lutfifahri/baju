<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class discounts extends Model
{
    protected $table = 'discounts';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    /**
     * Get the user that owns the discounts
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }
}
