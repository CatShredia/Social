<?php

namespace App\Http\Controllers;

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
    public function accessDenied()
    {
        return view('accessDenied');
    }
}
