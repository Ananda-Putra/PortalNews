<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function user()
    {
        return view('user');
    }
}
