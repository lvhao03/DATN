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
        'title',
        'thumnail',
        'admin_id',
<<<<<<< HEAD
        'content'
=======
        'content',
        'name_admin',
        'post_time',
>>>>>>> 381b5508eacd4586eacceede5dacf85fd4dff3af
    ];
    public $timestamps =false;
}
