<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $table = 'entries';

    protected $fillable = [
        'company',
        'date',
        'gst',
        'type',
        'type1',
        'address',
        'contact',
        'contactno',
        'email',
        'payment',
        'totalamount',
        'receivedamount',
        'bdmname',
        'remark',
        'product_name',
        'validity',
        'total_amount',
        'balance_amount',
        'image',
        'state',
    ];

    public function product()
    {
        return $this->hasMany(Products::class);
    }

}
