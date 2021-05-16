<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        // dd(111);
    }
    
    public function index()
    {
        return view('admin.dashboard');
    }
}
