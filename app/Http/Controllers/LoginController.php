<?php

namespace App\Http\Controllers;

use App\Mail\OTPEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function index(Request $request){
        $data = array();
        $data['errors'] = array(
            1 => ['Error: Username/Email and password combination OR Account does not exist.', 'danger'],
            2 => ['You are now logged out', 'primary'],
            3 => ['A new expenses has been saved.', 'primary'],
            4 => ['Successfully Verified', 'primary'],
            5 => ['Error: Access Denied.', 'danger'],
            6 => ['Session Expired', 'danger'],
        );
        if(!empty($request->input('err'))) {
            $data['err'] = $request->input('err');
        }

        if(session()->has('sessionkey')){
            return redirect('/logineddd');
        }

        return view('login', $data);
    }

    public function loginProcess(Request $request){
        $data = array();
        $input = $request->input();

        $userdata = DB::table('main_users')
            ->leftjoin('main_users_details', 'main_users_details.userid', '=', 'main_users.id')
            ->where('email', $input['email'])
            ->where('password', md5($input['password']))
            ->where('status', 'active')
            ->first();

        // Check if email exist
        if(empty($userdata)){
            return redirect('/login?err=1');
            die();
        }

        // Check if Verified
        if($userdata->verified == false){
            return redirect('verification?otp_token=' . $userdata->otp_token);
            die();
        }

        $userkey = [
            $userdata->id,
            $userdata->accounttype,
            $userdata->email,
            $userdata->username,
            $userdata->firstname,
            $userdata->middlename,
            $userdata->lastname,
            $userdata->birthdate,
            $userdata->gender,
            $userdata->province,
            $userdata->municipality,
            $userdata->mobilenumber,
            date('ymdHis')
        ];

        $userid = encrypt(implode($userkey, ','));
        $request->session()->put('sessionkey', $userid);
        session(['sessionkey' => $userid]);

        $goto = 'null';
        if($userdata->accounttype == 'admin') $goto = 'admin';
        if($userdata->accounttype == 'user') $goto = 'home';
        return redirect()->to($goto);
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect()->route('LoginScreen', ['err' => 2]);
    }


    public function register(Request $request){
        $data = array();
        $data['errors'] = array(
            1 => ['Error: Email already exist.', 'danger'],
            2 => ['Error: Password must be matched.', 'danger'],
            3 => ['Error: Password must be 8 characters long.', 'danger'],
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
            ->orderByRaw('municipality_name ASC')
            ->pluck('municipality_name', 'id')
            ->all();

        return response()->json($municipality);
    }

    public function registerProcess(Request $request){
        $data = array();
        $input = $request->input();

        // Email Check
        $checkEmail = DB::table('main_users')
            ->where('email', $input['email'])
            ->count();
        if($checkEmail == true){
            return redirect('/register?err=1');
        }

        // Password Length Check
        if(strlen($input['password']) < 8){
            return redirect('/register?err=3');
        }

        // Confirm Password Check
        if($input['password2'] != $input['password']){
            return redirect('/register?err=2');
        }

        // OTP Generated
        $otp = Str::upper(Str::random(6));
        $otptoken = Str::random(12);
        // Insert Data to main_users table
        $mainuserid = DB::table('main_users')
            ->insertGetID([
                'email' => $input['email'],
                'password' => md5($input['password']),
                'otp' => $otp,
                'otp_added_at' => Carbon::now()->toTimeString(),
                'otp_token' => $otptoken,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        // Insert Data to main_users_details table
        DB::table('main_users_details')
            ->insert([
                'userid' => $mainuserid,
                'username' => $input['username'],
                'firstname' => $input['firstname'],
                'middlename' => !empty($input['middlename']) ? $input['middlename'] : '',
                'lastname' => $input['lastname'],
                'birthdate' => $input['birthdate'],
                'gender' => $input['gender'],
                'province' => $input['province'],
                'municipality' => $input['municipality'],
                'mobilenumber' => $input['mobilenumber'],
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        return redirect('verification?otp_token=' . $otptoken);
    }

    public function verification(Request $request){
        $data = array();
        $data['errors'] = array(
            1 => ['Error: Email already exist.', 'danger'],
            2 => ['Error: Invalid OTP.', 'danger'],
            3 => ['Error: OTP Expired.', 'danger'],
            4 => ['Error: Your Session has been expired, please log in again.', 'danger'],
            5 => ['Error: Access Denied.', 'danger'],
        );
        if(!empty($request->input('err'))) {
            $data['err'] = $request->input('err');
        }

        $query = $request->query();
        if(empty($query)){
            return redirect('/login');
        }

        $checkToken = DB::table('main_users')
            ->where('otp_token', $query['otp_token'])
            ->count();

        // if there's no matching token, return to login
        if($checkToken == false){
            return redirect('/login');
        }

        $checkVerification = DB::table('main_users')
            ->where('otp_token', $query['otp_token'])
            ->first();

        // if verified, return to login
        if($checkVerification->verified == true){
            return redirect('/login');
        }

        if(!$request->query('err')){
            $reqOTP = Str::upper(Str::random(6));
            DB::table('main_users')
                ->where('otp_token', $query['otp_token'])
                ->update([
                    'otp' => $reqOTP,
                    'otp_added_at' => Carbon::now()->toTimeString(),
                ]);

            $getName = DB::table('main_users_details')
                ->where('userid', $checkVerification->id)
                ->first();

            $user = $getName->firstname . ' ' . $getName->lastname;
            $code = $reqOTP;
            Mail::to($checkVerification->email)->send(new OTPEmail($user, $code));
        }

        $data['token'] = $query['otp_token'];
        return view('otp', $data);
    }

    public function checkOTP(Request $request){
        $data = array();
        $input = $request->input();

        $checkToken = DB::table('main_users')
            ->where('otp_token', $input['token'])
            ->first();


        $currentTime = Carbon::now();
        $inputTime = Carbon::createFromFormat('H:i:s', $checkToken->otp_added_at);

        $diffTime = $currentTime->diffInMinutes($inputTime);

        if($diffTime >= 3){
            return redirect('/verification?otp_token='. $input['token'] . '&err=3');
        }

        if(Str::upper($input['otp']) == $checkToken->otp){
            DB::table('main_users')
                ->where('otp_token', $input['token'])
                ->update([
                    'verified' => 1,
                ]);
            return redirect('login?err=4');
        } else {
            return redirect('/verification?otp_token='. $input['token'] . '&err=2');
        }
    }

    public function requestOTP(Request $request){
        $query = $request->query();
        $input = $request->input();

        $reqOTP = Str::upper(Str::random(6));
        $getToken = DB::table('main_users')
            ->where('otp_token', $query['otp_token'])
            ->update([
                'otp' => $reqOTP,
                'otp_added_at' => Carbon::now()->toTimeString(),
            ]);

        $getEmail = DB::table('main_users')
            ->where('otp_token', $query['otp_token'])
            ->first();

        $getName = DB::table('main_users_details')
            ->where('userid', $getEmail->id)
            ->first();

        $user = $getName->firstname . ' ' . $getName->lastname;
        $code = $reqOTP;
        Mail::to($getEmail->email)->send(new OTPEmail($user, $code));

    }
}
