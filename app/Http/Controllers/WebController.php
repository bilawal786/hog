<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        return view('front.home');
    }
    public function about(){
        return view('front.about');
    }
    public function services(){
        return view('front.services');
    }
    public function contact(){
        return view('front.contact');
    }
    public function resources(){
        return view('front.resources');
    }
    public function policy(){
        return view('front.policy');
    }
    public function faq(){
        return view('front.faq');
    }
}
