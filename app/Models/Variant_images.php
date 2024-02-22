<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant_images extends Model
{
    use HasFactory;
    protected $table = '';
    protected $primaryKey = 'imageID';
    protected $fillable = [ 
        'image_url',
        'variant_id',
    ];
}
