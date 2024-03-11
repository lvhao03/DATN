<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialModel extends Model
{
    use HasFactory;
    public $table="material";

    protected $primaryKey = 'materialID';
    public $fillable=[
        'name'
    ];
    public $timestamps =false;
}
