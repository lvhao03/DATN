<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeModel extends Model
{
    use HasFactory;
    protected $table = 'size';
    protected $primaryKey = 'sizeID';
    protected $fillable = [
        'name',
        'weight',
        'height',
    ];
    public $timestamps =false;
}
