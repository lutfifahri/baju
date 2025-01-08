<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class suppliers extends Model
{
    protected $table = 'suppliers';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
