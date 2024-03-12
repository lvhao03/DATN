<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    use HasFactory;
    protected $table = 'employee';
    protected $primaryKey = 'employeeID';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'email',
        'password',
        'image_url',
        'phone',
        'role_id'
    ];

}
