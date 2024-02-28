<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        // existing fields...
        'order_number',
        'secret_code',
        'shop',
    ];
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

}
