<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    use HasFactory;
    public $table="comments";
<<<<<<< HEAD

    protected $primaryKey = 'commentID';
    public $fillable=[
=======
    protected $primaryKey = 'commentID';
    public $timestamps = false;
    public $fillable = [
>>>>>>> c2d87cbfe5e9c12810cbfef9a90434e6b71df32d
        'content',
        'customer_id',
        'product_id',
    ];

<<<<<<< HEAD
    public $timestamps =false;
=======
>>>>>>> c2d87cbfe5e9c12810cbfef9a90434e6b71df32d
}
