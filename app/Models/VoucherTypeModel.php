<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherTypeModel extends Model
{
    use HasFactory;
    protected $table = 'voucher_type';
    protected $primaryKey = 'voucher_typeID';
    protected $fillable = [
        'name',
        'discount'
    ];
    public $timestamps =false;
}
