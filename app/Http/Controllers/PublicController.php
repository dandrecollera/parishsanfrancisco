<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home(Request $request){
        return view('landingpage');
    }

    public function about(Request $request){
        return view('about');
    }

    public function services(Request $request){
        return view('services');
    }

    public function faqs(Request $request){
        return view('faqs');
    }
}
