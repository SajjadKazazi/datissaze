<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminLogin');
    }
    public function index(){
        return view('admin.dashboard');
    }

    public function fileManager(){
        return view('admin.utilities.file-manager');

    }
}
