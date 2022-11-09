<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'image',
        'qty',
        'price',
        'status',
    ];

    public function getDefaultValues()
    {
        return [
            'user_id' => '',
            'name' => '',
            'description' => '',
            'image' => '',
            'qty' => '',
            'price' => '',
            'status' => '',
        ];
    }
}
