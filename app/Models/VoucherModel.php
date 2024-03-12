<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherModel extends Model
{
    use HasFactory;
    protected $table = 'voucher';
    protected $primaryKey = 'voucherID';
    protected $fillable = [
        'name',
        'start_date',
        'expired_date',
        'voucher_typeID',
        'voucher_quantity',
    ];
    public $timestamps =false;
}
