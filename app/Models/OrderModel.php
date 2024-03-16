<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;
    public $table="order";

    protected $primaryKey = 'orderID';
    public $fillable=[
        'total_ammount',
        'user_id',
        'order_date',
        'coupon_id',
        'order_status',
        'shipment_status',
        'rating',
        'payment_method',
        'payment_id',
        'lading_id',
    ];
    public $timestamps =false;
}
