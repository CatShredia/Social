<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return redirect(route('post.index'));
    }
    public function test()
    {
        return view('test');
    }
}
