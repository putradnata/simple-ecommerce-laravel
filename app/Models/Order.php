<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'invoice_code',
        'buyer_id',
        'name',
        'phone',
        'email',
        'address',
        'payment',
        'total',
        'payment_img',
    ];
}
