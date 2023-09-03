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

    public function public_donation(Request $request){
        $input = $request->input();

        dd($input);

    }

    public function fileProcess($input, $service, $type, $info) {
        $photo = 'blank.jpg';

        $now = Carbon::now();
        $formattedNow = $now->format('Ymd_His');

        $baseDestinationPath = 'public/' . $service;

        if ($type == 'receipt') {
            $destinationPath = 'public/' . $service . '/receipt';
        } else {
            $destinationPath = 'public/' . $service . '/requirement';
        }

        $image = $input;
        $extension = $image->getClientOriginalExtension();
        $filename = $info . '_' . $formattedNow . '.' . $extension;
        $path = $image->storeAs($destinationPath, $filename); // Changed from $input->storeAs(...)
        $photo = $filename;

        return $photo;
    }
}
