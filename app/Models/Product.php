<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'productID';
    protected $fillable = [
        'name',
        'description',
        'thumnail',
        'category_id',
    ];
    public $timestamps =false;
}
