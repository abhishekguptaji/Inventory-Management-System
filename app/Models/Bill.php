<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name', 'mobile_number', 'address',
        'grand_total', 'paid_amount', 'balance', 'items'
    ];

    protected $casts = [
        'items' => 'array'
    ]; 

    public function items()
    {
        return $this->hasMany(BillItem::class);
    }

}
