<?php

namespace App\Http\Controllers\Admin\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('Admin/Index/index');
    }
}
