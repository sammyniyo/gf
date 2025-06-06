<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function about()
    {
        return view('about');
    }
    public function story()
    {
        return view('story');
    }
    public function privacy()
    {
        return view('privacy');
    }
    public function showMemberForm()
    {
        return view('member-registration');
    }
    public function contact()
    {
        return view('contact');
    }
}
