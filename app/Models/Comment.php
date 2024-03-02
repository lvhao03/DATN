<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $primaryKey = 'commentID';
    public $timestamps = false;
    protected $fillable = [ 
        'content',
        'customer_id',
        'product_id',
    ];
}