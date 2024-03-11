<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmployeeModel;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $title = 'Danh mục nhân viên';
        $data = EmployeeModel::all();
        return view('admin.employee.index', compact('data','title'));
    }
}
