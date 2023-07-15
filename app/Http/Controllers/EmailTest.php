<?php

namespace App\Http\Controllers;

use App\Mail\OTPEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class EmailTest extends Controller
{
    public function index(Request $request){
        $user = "Dandre Collera";
        $code = "TESTONLY";
        Mail::to('dandrecollera@gmail.com')->send(new OTPEmail($user, $code));
    }
}
