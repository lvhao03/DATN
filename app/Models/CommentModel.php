<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    use HasFactory;
    public $table="comments";

    protected $primaryKey = 'commentID';
    public $fillable=[
        'content',
        'customer_id',
        'product_id',
    ];

    public $timestamps =false;
}
