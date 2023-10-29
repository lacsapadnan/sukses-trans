<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeliveryOrder extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'number', 'po_number', 'delivery_with', 'police_number', 'driver_name', 'date'
    ];

    public function details()
    {
        return $this->hasMany(DeliveryOrderDetail::class);
    }
}
