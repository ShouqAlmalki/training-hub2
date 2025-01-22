<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() 
    {
        $user = auth()->user();
        return view("student.dashboard", compact("user"));
    }
}
