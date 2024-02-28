<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'status',
        'payment_status',
        'transfer_receipt_img',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
