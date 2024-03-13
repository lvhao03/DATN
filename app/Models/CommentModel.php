<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    use HasFactory;
    public $table="comments";
    protected $primaryKey = 'commentID';
    public $timestamps = false;
    public $fillable = [
        'content',
        'user_id',
        'product_id',
    ];

}
