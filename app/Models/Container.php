<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Container extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'invoice',
        'consignee_name',
        'out_date',
        'bl_number',
        'application_number',
        'container_number',
        'lift_off',
        'repair',
        'demurrage',
        'destination',
    ];
}
