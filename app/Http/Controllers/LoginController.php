<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{
    public function index(Request $request){
        $data = array();
        $data['errors'] = array(
            1 => ['Error: Username/Email and password combination OR Account does not exist.', 'danger'],
            2 => ['You are now logged out', 'primary'],
            3 => ['A new expenses has been saved.', 'primary'],
            4 => ['Error: Your Session has been expired, please log in again.', 'danger'],
            5 => ['Error: Access Denied.', 'danger'],
        );
        if(!empty($request->input('err'))) {
            $data['err'] = $request->input('err');
        }

        return view('login', $data);
    }


    public function register(Request $request){
        $data = array();
        $data['errors'] = array(
            1 => ['Error: Username/Email and password combination OR Account does not exist.', 'danger'],
            2 => ['You are now logged out', 'primary'],
            3 => ['A new expenses has been saved.', 'primary'],
            4 => ['Error: Your Session has been expired, please log in again.', 'danger'],
            5 => ['Error: Access Denied.', 'danger'],
        );
        if(!empty($request->input('err'))) {
            $data['err'] = $request->input('err');
        }

        $data['province'] = $provincedb = DB::table('province')
            ->orderBy('province_name', 'asc')
            ->get()
            ->toArray();


        return view('register', $data);
    }

    public function getMunicipality($province){

        Log::debug("Province: $province");

        $municipality = DB::table('municipality')
            ->where('province_id', $province)
            ->pluck('municipality_name', 'id');

        return response()->json($municipality);
    }

    public function login(Request $request){
        $data = array();
        $data['inputs'] = $request->input();
    }
}
