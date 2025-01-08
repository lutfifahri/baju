<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public function Categories(): BelongsTo
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
}
