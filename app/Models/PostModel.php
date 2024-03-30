<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $primaryKey = 'postID';
    protected $fillable = [
        'postID',
        'title',
        'thumnail',
        'admin_id',
        'content',
        'name_admin',
        'post_time',
    ];
    public $timestamps =false;
}
