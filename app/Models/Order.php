<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'total_price',
        'payment_status',
        'shipping_first_name',
        'shipping_last_name',
        'shipping_email',
        'shipping_phone',
        'shipping_address_line',
        'shipping_address_line_2',
        'shipping_city',
        'shipping_state',
        'shipping_country',
        'shipping_postal_code',
    ];

    protected $casts = [
        'total_price' => 'decimal:2',
        'payment_status' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
